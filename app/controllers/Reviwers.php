<?php
class Reviwers extends Controller
{
    public function __construct()
    {

        $this->ReviwerModel = $this->model('Reviwer');
        $this->loginModel = $this->model('Login');
        if (!isLoggedIn()) {
            redirect('logins/&id=6');
        }
    }

    public function paperReport()
    {

        $rid = $_SESSION['user_id'];
        $report =  $this->ReviwerModel->report($rid);
        $status =  $this->ReviwerModel->getStatus();
        $email =  $this->ReviwerModel->getEmail($rid);
        foreach ($report as $s)
            $v = $s->PAPER_SUB_ID;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'report' => $report,
                'status' => $status,
                'file' => rim($_POST['file']),
                'comment' => rim($_POST['comment']),
                'statu' => rim($_POST['statu']),
                'email' => ($email),
                'pid' => $v,
                'sub' => '',
                'body' => '',
                'file_err' => '',
                'comment_err' => '',
                'statu_err' => ''
            ];
            if (empty($data["file"])) {
                $data["file_err"] = "file is required";
            }
            if (empty($data["statu"])) {
                $data["statu_err"] = "status is required";
            }
            if (empty($data["comment"])) {
                $data["comment_err"] = "comment is required";
            };
            // Make sure errors are empty
            if (empty($data['file_err']) && empty($data['statu_err']) && empty($data['comment_err'])) {
                $data['email'] = $data['email']->email;
                // Validated
                $data['sub'] = 'feedback by reviwer by ' . $_SESSION['user_name'];
                $data['body'] = $data['comment'];
                $data['sub'] = rim($data['sub']);
                // set feedback  $this->ReviwerModel->setComment($data) &&
                if (empty($data['email']) && empty($data['sub'])) {
                    echo 'script>alert("err");</script>' . 'bkj';
                    // Load view with errors
                    $this->view('reviwers/paperReport', $data);
                }
                if ($this->ReviwerModel->authorComment($data)) {

                    if (vmail($data)) {
                        flash('register_success', 'You are registered and can log in');
                        redirect('reviwers/paperReport');
                    } else {
                        echo "<script> alert('mail is not send ');</script>";
                    }
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('reviwers/paperReport', $data);
            }
        } else {
            $data = [
                'report' => $report,
                'status' => $status,
                'file' => '',
                'comment' => '',
                'statu' => '',
                'file_err' => '',
                'comment_err' => '',
                'statu_err' => ''
            ];
            $this->view('reviwers/paperReport', $data);
        }
        $this->view('reviwers/paperReport', $data);
    }

    public function adminNotic()
    {
        $rid = $_SESSION['user_id'];
        $notic =  $this->ReviwerModel->getNotice($rid);
        $data = [
            'notic' => $notic
        ];
        $this->view('reviwers/adminNotic', $data);
    }
    public function Downloads()
    {
        $rid = $_SESSION['user_id'];
        echo $rid;
        $dow = $this->ReviwerModel->paperAuthorDownload($rid);
        $data = [
            'download' => $dow
        ];

        $this->view('reviwers/Downloads', $data);
    }

    public function paperDownload()
    {
        $rid = $_SESSION['user_id'];
        $download =  $this->ReviwerModel->download($rid);
        $data = [
            'download' => $download
        ];

        $this->view('reviwers/paperDownload', $data);
    }
    public function  paperSubDetials()
    {
        $rid = $_SESSION['user_id'];
        $paper =  $this->ReviwerModel->paperIssue($rid);
        $de =  $this->ReviwerModel->paperSubmition($rid);
        $data = [
            'paper' => $paper,
            'details' => $de
        ];

        $this->view('reviwers/paperSubDetials', $data);
    }
    public function paperIssue()
    {
        $rid = $_SESSION['user_id'];
        $paper =  $this->ReviwerModel->paperIssue($rid);
        $data = [
            'paper' => $paper
        ];

        $this->view('reviwers/paperIssue', $data);
    }
    public function index()
    {
        $name = $_SESSION['user_name'];
        $data = [
            'name' => $name,
            'description' => ' are aiming to the leading scientific publisher and publish an expanding academic research content programme.'
        ];

        $this->view('reviwers/index', $data);
    }
}
