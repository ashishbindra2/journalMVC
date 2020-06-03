<?php
class Associates extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('logins/&id=6');
        }
        $this->editorModel = $this->model('Editor');
        $this->associateModel = $this->model('Associate');
        $this->loginModel = $this->model('Login');
    }

    public function editIssue()
    {
        $id = $_GET['ID'];
        $results = $this->associateModel->editIssues($id);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'issue' => $results,
                'month' => rim($_POST["issue_month"]),
                'volume' => rim($_POST["volume_no"]),
                'special' => rim($_POST["is_special_issue"]),
                'year' => rim($_POST["issue_year"]),
                'specialName' => rim($_POST["special_issue_name"]),
                'month_err' => '',
                'volume_err' => '',
                'year_err' => ''
            ];
            if (empty($data['month'])) {
                $data['month_err'] = 'issue month is empty';
            }
            if (empty($data['volume'])) {
                $data['volume_err'] = 'Volume is empty';
            }
            if (empty($data['year'])) {
                $data['year_err'] = 'issue year is empty';
            }
            if (empty($data['month_err']) && empty($data['volume_err']) && empty($data['year_err'])) {
                if ($this->associateModel->updateIssues($data)) {
                    redirect('associates/viewIssue');
                } else {
                    die('domthing went wrong!!!!');
                }
            } else {
                //load error
                $this->view('associates/editIssue', $data);
            }
        } else {
            $data = [
                'issue' => $results,
                'month' => '',
                'volume' => '',
                'special' => '',
                'year' => '',
                'specialName' => '',

                'month_err' => '',
                'volume_err' => '',
                'year_err' => '',

            ];
        }
        $this->view('associates/editIssue', $data);
    }
    public function deleteIssues()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['as'];
            if ($this->associateModel->deleteIssue($id)) {
                flash('post_message', 'Post Removed');
                redirect('associates');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('associates');
        }
    }
    public function paperStatus()
    {
        $aid = $_GET['aid'];
        $Paper = $this->editorModel->getPaperDetail($aid);
        $data = [
            'authorsPaper' => $Paper
        ];
        $this->view('associates/paperStatus', $data);
    }
    public function reviewerDetail()
    {
        $rid = $_GET['rid'];
        $reviwer = $this->editorModel->getReviweDetial($rid);
        $data = [
            'view' =>  $reviwer
        ];
        $this->view('associates/reviewerDetail', $data);
    }
    public function viewAuthDetails()
    {
        $aid = $_GET['aid'];
        $authorPaper = $this->editorModel->getAuthPaper($aid);
        $data = [
            'aid' => $aid,
            'authorPaper' => $authorPaper
        ];
        $this->view('associates/viewAuthDetails', $data);
    }
    public function deleteReviwer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['as'];
            if ($this->associateModel->deleteReviwers($id)) {
                flash('post_message', 'Post Removed');
                redirect('associates/viewReviewer');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('associates/viewReviewer');
        }
    }
    public function viewReviewer()
    {

        $reviwer = $this->editorModel->getReviwer();
        $data = [
            'view' =>  $reviwer
        ];
        $this->view('associates/viewReviewer', $data);
    }
    public function addReviwer()
    {
        $country =  $this->associateModel->country();
        $stream =  $this->associateModel->getStream();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' =>  rim($_POST["name"]),
                'gender' => rim($_POST["gender"]),
                'title' => rim($_POST["title"]),
                'des' => rim($_POST["designation"]),
                'stream' => rim($_POST["stream"]),
                'institude' => rim($_POST["institute_name"]),
                'address' => rim($_POST["institute_address"]),
                'city' => rim($_POST["city"]),
                'state' => rim($_POST["state"]),
                'country' => rim($_POST["country"]),
                'email' => rim($_POST["email"]),
                'password' => rim($_POST["password"]),
                'confirm_password' => rim($_POST['pass2']),
                'dob' => rim($_POST["D_O_R"]),
                'status' => rim($_POST["status"]),
                'webPage' => rim($_POST["webpage"]),
                'img' => rim($_POST["photograph"]),

                'name_err' => '',
                'gender_err' => '',
                'title_err' => '',
                'des_err' => '',
                'stream_err' => '',
                'institude_err' => '',
                'address_err' => '',
                'city_err' => '',
                'state_err' => '',
                'country_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'dob_err' => '',
                'status_err' => '',
                'webPage_err' => '',
                'img_err' => ''

            ];

            if (empty($data["name"])) {
                $data["name_err"] = "name is required";
            }
            if (empty($data["gender"])) {
                $data["gender_err"] = "gender is required";
            }
            if (empty($data["title"])) {
                $data["title_err"] = "title is required";
            }
            if (empty($data["des"])) {
                $data["des_err"] = "designation is required";
            }
            if (empty($data["stream"])) {
                $data["stream_err"] = "stream is required";
            }
            if (empty($data["institude"])) {
                $data["institude_err"] = "institute_name is required";
            }
            if (empty($data["address"])) {
                $data["address_err"] = "institute_address is required";
            }
            if (empty($data["city"])) {
                $data["city_err"] = "city is required";
            }
            if (empty($data["state"])) {
                $data["state_err"] = "state is required";
            }
            if (empty($data["country"])) {
                $data["country_err"] = "country is required";
            }
            if (empty($data["email"])) {
                $data["email_err"] = "email is required";
            } else {
                if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL))
                    $data["email_err"] = "Invalid email format";
            }
            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Pleae enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Pleae confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            if (empty($data["dob"])) {
                $data["dob_err"] = "D_O_R is required";
            }
            if (empty($data["status"])) {
                $data["status_err"] = "status is required";
            }
            if (empty($data["webpage"])) {
                $data["webpage_err"] = "webpage is required";
            } else {
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $data["webpage"])) {
                    $data["webpage_err"] = "Invalid URL";
                }
            }
            if (empty($data["img"])) {
                $data["img_err"] = "photograph is required";
            }
            if (
                empty($data['status_err']) && empty($data['dob_err']) &&
                empty($data['password_err']) && empty($data['institude_err']) && empty($data['address_err']) && empty($data['des_err']) &&
                empty($data['email_err']) && empty($data['country_err'])  &&
                empty($data['stream_err']) && empty($data['name_err']) && empty($data['gender_err']) && empty($data['title_err'])
            ) {
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->associateModel->addReviwer($data)) {
                    redirect('associates/viewReviewer');
                    // flash('register_success', 'You are registered and can log in');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('associates/addReviwer', $data);
            }
        } else {
            $data = [
                'name' => '',
                'gender' => '',
                'title' => '',
                'des' => '',
                'stream' => $stream,
                'institude' => '',
                'address' => '',
                'city' => '',
                'state' => '',
                'country' => $country,
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'dob' => '',
                'status' => '',
                'webPage' => '',
                'img' => '',
                'name_err' => '',
                'gender_err' => '',
                'title_err' => '',
                'des_err' => '',
                'stream_err' => '',
                'institude_err' => '',
                'address_err' => '',
                'city_err' => '',
                'state_err' => '',
                'country_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'dob_err' => '',
                'status_err' => '',
                'webPage_err' => '',
                'img_err' => ''
            ];
            $this->view('associates/addReviwer', $data);
        }
        // 

        $this->view('associates/addReviwer', $data);
    }
    public function notic()
    {
        $reviwer = $this->editorModel->getReviwer();
        $journal = $this->editorModel->getJournals();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'journal' => $journal,
                'reviwer' => $reviwer,
                'pid' => rim($_POST['pid']),
                'rid' => rim($_POST['rid']),
                'date' => rim($_POST['date']),
                'notic' => rim($_POST['notic']),
                'pid_err' => '',
                'rid_err' => '',
                'date_err' => '',
                'notic_err' => ''
            ];

            if (empty($data["pid"])) {
                $data["pid_err"] = "paper is required";
            }
            if (empty($data["rid"])) {
                $data["rid_err"] = "Reviewer is required";
            }

            if (empty($data["date"])) {
                $data["date_err"] = "date is required";
            }
            if (empty($data["notic"])) {
                $data["notic_err"] = "Notic is required";
            }
            if (
                empty($data["pid_err"])  &&  empty($data["rid_err"]) && empty($data["date_err"]) && empty($data["notic_err"])
            ) {

                if ($this->associateModel->reminderDetail($data)) {
                    $this->view('associates/notic', $data);
                    flash('register_success', 'You are registered and can log in');
                } else {
                    echo "(<script>alert('query error');</script>";
                    die('Something went wrong');
                }
            } else {
                $this->view('associates/notic', $data);
            }
        } else {
            $data = [
                'journal' => $journal,
                'reviwer' => $reviwer,
                'pid' => '',
                'rid' => '',
                'date' => '',
                'notic' => '',
                'pid_err' => '',
                'rid_err' => '',
                'date_err' => '',
                'notic_err' => '',
            ];
            $this->view('associates/notic', $data);
        }
        $this->view('associates/notic', $data);
    }
    public function reviewer()
    {

        $reviwer = $this->editorModel->getReviwe();
        $data = [
            'view' =>  $reviwer
        ];
        $this->view('associates/reviewer', $data);
    }
    public function suggesedReviwer()
    {
        // $eid = $_SESSION['user_id'];
        $sugest = $this->associateModel->suggestion();
        $data = [
            'sugest' => $sugest
        ];
        $this->view('associates/suggesedReviwer', $data);
    }
    public function assig_to_review()
    {
        $journal = $this->editorModel->getJournals();
        $author = $this->editorModel->getAuthor();
        $reviwer = $this->editorModel->getReviwer();
        $paper = $this->associateModel->paper();


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'author' => $author,
                'journal' => $journal,
                'reviwer' => $reviwer,
                'paper' => $paper,
                'jid' => rim($_POST["jidd"]),
                'volume' => rim($_POST["idd"]),
                'rid' => rim($_POST["rid"]),
                'file' => rim($_POST["myfile"]),
                'rid2' => rim($_POST["rid2"]),
                'rid3' => rim($_POST["rid3"]),
                'jid_err' => '',
                'volume_err' => '',
                'rid_err' => '',
                'file_err' => '',
                'rid2_err' => '',
                'rid3_err' => ''
            ];
            if (empty($data["jid"]) || $data["jid"] == "") {
                $data["jid_err"] = "journal name is required";
            }
            if (empty($data["volume"]) || $data["volume"] == "") {
                $data["volume_err"] = "VOLUME NO is required";
            }
            if (empty($data["rid"]) || $data["rid"] == "") {
                $data["rid_err"] = "Reviewer1 is required";
            }
            if (empty($data["file"]) || $data["file"] == "") {
                $data["file_err"] = "file is required";
            }
            if (empty($data["rid2"]) || $data["rid2"] == "") {
                $data["rid2_err"] = "Reviewer2 is required";
            }
            if (empty($data["rid3"]) || $data["rid3"] == "") {
                $data["rid3_err"] = "Reviewer3 is required";
            }

            if (
                empty($data["jid_err"]) && empty($data["volume_err"]) && empty($data["file_err"]) &&
                empty($data["rid_err"]) && empty($data["rid2_err"]) && empty($data["rid3_err"])
            ) {
                # code...
                // echo "string nhi Empity ha";
                if (
                    $this->associateModel->assingment($data, $data['rid']) && $this->associateModel->assingment($data, $data['rid2'])
                    && $this->associateModel->assingment($data, $data['rid3'])
                ) {
                    $this->view('associates/assig_to_review', $data);
                    flash('register_success', 'You are registered and can log in');
                } else {
                    echo "(<script>alert('query error');</script>";
                    die('Something went wrong');
                }
            } else {

                $this->view('associates/assig_to_review', $data);
            }
        } else {
            $data = [
                'author' => $author,
                'journal' => $journal,
                'reviwer' => $reviwer,
                'paper' => $paper,
                'jid' => '',
                'volume' => '',
                'rid' => '',
                'file' => '',
                'rid2' => '',
                'rid3' => '',
                'jid_err' => '',
                'volume_err' => '',
                'rid_err' => '',
                'file_err' => '',
                'rid2_err' => '',
                'rid3_err' => ''
            ];

            $this->view('associates/assig_to_review', $data);
        }

        $this->view('associates/assig_to_review', $data);
    }
    public function viewAuthor()
    {
        $author = $this->editorModel->getAuthor();
        $data = [
            'author' => $author
        ];
        $this->view('associates/viewAuthor', $data);
    }
    public function addIssue()
    {
        $issue = $this->editorModel->issue();
        $journal = $this->editorModel->getJournals();
        $journalStatus = $this->editorModel->journalStatus();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'journalStatus' => $journalStatus,
                'journal' => $journal,
                'issue' => $issue,
                'jName' => rim($_POST["j_name"]),
                'issueName' => rim($_POST["issue_name"]),
                'isSpecialIssue' => rim($_POST["isspecialissue"]),
                'date' => rim($_POST["d_o_uploading"]),
                'volume' => rim($_POST["volume_no"]),
                'month' => rim($_POST["issue_month"]),
                'year' => rim($_POST["issue_year"]),
                'jid' => rim($_POST["journal_status_id"]),

                'jName_err' => '',
                'issueName_err' => '',
                'isSpecialIssue_err' => '',
                'date_err' => '',
                'volume_err' => '',
                'month_err' => '',
                'year_err' => '',
                'jid_err' => ''
            ];
            if (empty($data['jName'])) {
                $data['jNmae_err'] = "Journl name is required";
            }
            if (empty($data['issueName'])) {
                $data['issueName_err']  = "Issue name is required";
            }
            if (empty($data['isSpecialIssue'])) {
                $data['isSpecialIssue_err']  = "Special Issue is required"; //1
            }
            if (empty($data['date'])) {
                $data['date_err']  = "date is required";
            }
            if (empty($data['volume'])) {
                $data['volume_err']  = "volume_no is required"; //2
            }
            if (empty($data['month'])) {
                $data['month_err']  = "month is required"; //3
            }
            if (empty($data['year'])) {
                $data['year_err']  = "year is required"; //3
            }
            if (empty($data['jid'])) {
                $data['jid_err']  = "Journl name is required";
            }
            if (
                empty($data['jName_err'])   &&  empty($data['month_err'])
                && empty($data['date_err'])  && empty($data['volume_err'])
                &&   empty($data['year_err']) &&  empty($data['jid_err'])
            ) {
                if ($this->editorModel->addIssue($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('editors/viewIssue');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('associates/addIssue', $data);
            }
        } else {
            $data = [
                'journalStatus' => $journalStatus,
                'journal' => $journal,
                'jName' => '',
                'issueName' => '',
                'isSpecialIssue' => '',
                'date' => '',
                'volume' => '',
                'month' => '',
                'year' => '',
                'jid' => '',

                'jName_err' => '',
                'issueName_err' => '',
                'isSpecialIssue_err' => '',
                'date_err' => '',
                'volume_err' => '',
                'month_err' => '',
                'year_err' => '',
                'jid_err' => ''
            ];
            $this->view('associates/addIssue', $data);
        }
    }
    public function viewIssue()
    {

        $issue = $this->associateModel->issue();
        $data = [
            'issue' => $issue
        ];

        $this->view('associates/viewIssue', $data);
    }
    public function ajaxData()
    {
        $jid =  $_POST["JOURNAL_ID"];
        $issue = $this->associateModel->jissie($jid);
        $data = [
            'issue' => $issue
        ];

        $this->view('associates/ajaxData', $data);
    }

    public function ajaxPaper()
    {
        $rid =  $_POST["REVIEWER_ID"];
        $issue = $this->associateModel->getPaperData($rid);
        print_r($issue);
        $data = [
            'issue' => $issue
        ];

        $this->view('associates/ajaxPaper', $data);
    }
    public function  ajaxState()
    {
        $cid =  $_POST["country_id"];
        $sid =  $_POST["state_id"];

        $state = $this->associateModel->state($cid);
        $coun = $this->associateModel->city($sid);
        $data = [
            // 'country' => $coun,
            'state' => $state,
            'city' => $coun
        ];

        $this->view('associates/ajaxState', $data);
    }
    public function index()
    {
        $id = ($_SESSION['user_id']);
        $email = ($_SESSION['user_email']);
        $name =  ($_SESSION['user_name']);
        $numberOfJournals = $this->associateModel->countJournals();
        $numberOfIssue = $this->associateModel->countIssue();
        $numberOfReviwer = $this->associateModel->countReviewer();
        $numberOfAuthor = $this->associateModel->countAuthors();
        $data = [
            'name' => $name,
            'author' => $numberOfAuthor,
            'reviwer' => $numberOfReviwer,
            'issue' => $numberOfIssue,
            'journal' => $numberOfJournals,
            'header-title' => 'Channel for touching the hights of the sky.',
            'title' => 'Welcome to Vidya Publications',
            'description' => ' are aiming to the leading scientific publisher and publish an expanding academic research content programme.'
        ];

        $this->view('associates/index', $data);
    }
}
