<?php
class Admins extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        $this->editorModel = $this->model('Editor');
        $this->loginModel = $this->model('Login');
    }
    public function updateJournal()
    {
        $id = $_GET['ID'];
        $stream = $this->loginModel->stream();
        $journal = $this->editorModel->getJournalByStream();
        $journalName = $this->editorModel->getJournalById($id);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'stream' => $stream,
                'journal' => $journal,
                'journa' => $journalName,
                'id' => $id,
                'name' => rim($_POST['journal_name']),
                'jAbb' => rim($_POST['journal_n_abb']),
                'status' => rim($_POST['status']),
                'sid' => rim($_POST["Stream_id"]),
                'jP' => rim($_POST['j_issn_p']),
                'jE' => rim($_POST['j_issn_e']),
                'frequency' => rim($_POST['frequency']),

                'name_err' => '',
                'jAbb_err' => '',
                'status_err' => '',
                'sid_err' => '',
                'jP_err' => '',
                'jE_err' => '',
                'frequency_err' => ''

            ];

            if (empty($data['name'])) {
                $data['name_err'] = "journal name is required";
            }
            if (empty($data['jAbb'])) {
                $data['jAbb_err'] = "Abbervation is required";
            }
            if (empty($data['status'])) {
                if ($data['status'] != '0')
                    $data['status_err'] = "status is required";
            }
            if (empty($data['jP'])) {
                $data['jP_err'] = "print is required";
            }
            if (empty($data['jE'])) {
                $data['jE_err'] = "online is required";
            }
            if (empty($data['frequency'])) {
                $data['frequency_err'] = "frequency is required";
            }
            if (empty($data['sid'])) {
                $data['sid_err'] = "stream is required";
            }
            if (
                empty($data['name_err']) && empty($data['jAbb_err']) &&
                empty($data['status_err']) && empty($data['sid_err']) &&
                empty($_POST['jP_err']) && empty($_POST['jE_err']) &&
                empty($_POST['frequency_err'])
            ) {
                if ($this->editorModel->updateJournal($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('admins/viewJournal');
                } else {
                    die('Something went wrong');
                }
            } else
                $this->view('admins/updateJournal', $data);
        } else {
            $data = [
                'stream' => $stream,
                'journal' => $journal,
                'journa' => $journalName,
                'name' =>  '',
                'jAbb' => '',
                'status' => '',
                'sid' => '',
                'frequency' => '',
                'name_err' => '',
                'jAbb_err' => '',
                'status_err' => '',
                'sid_err' => '',
                'jP_err' => '',
                'jE_err' => '',
                'frequency' => ''
            ];
            $this->view('admins/updateJournal', $data);
        }
    }
    public function updateEditor()
    {
        $id = $_GET['ID'];
        $assocaie = $this->adminModel->editEditor($id);
        $journalsId = $this->loginModel->getJournals();
        $allStream = $this->loginModel->stream();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'journalId' => $journalsId,
                'title' => 'test Us',
                'stream' => $allStream,
                'name' => rim($_POST['name']),
                'email' => rim($_POST['email']),
                'mobile' => rim($_POST['mobile']),
                'web' => rim($_POST['weblink']),
                'status' => rim($_POST['status']),
                'college' => rim($_POST['college_name']),
                'detail' => rim($_POST['Detail']),
                'id' => $id,
                'sid' => trim($_POST['sid']),
                'stream_err' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'mobile_err' => '',
                'web_err' => '',
                'status_err' => '',
                'college_err' => '',
                'detail_err' => ''
            ];
            if (empty($data["id"])) {
                $data["id_err"] = "Stream name is required";
            }
            if (empty($data["name"])) {
                $data["name_err"] = "Name is required";
            }
            if (empty($data["email"])) {
                $data["email_err"] = "email is required";
            }
            if ($this->adminModel->$data['email']) {
                $data["email_err"] = "email is alreday registred";
            }

            if (empty($data["mobile"])) {
                $data["mobile_err"] = "mobile no is required";
            }

            if (empty($data["status"])) {
                $data["status_err"] = "Status is required";
            }
            if (empty($data["college"])) {
                $data["college_err"] = "college_name is required";
            }
            if (empty($data["detail"])) {
                $data["detail_err"] = "Details is required";
            }
            // Make sure errors are empty
            if (
                empty($data['email_err']) && empty($data['name_err'])  && empty($data['id_err']) &&
                empty($data['status_err']) && empty($data['mobile_err']) && empty($data['college_err'])
            ) {

                if ($this->adminModel->updateEditor($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('admins/viewEditor');
                } else {
                    die('Something went wrong');
                }
            } else
                $this->view('admins/updateEditor', $data);
        } else {
            $data = [
                'journalId' => $journalsId,
                'title' => 'test Us',
                'stream' => $allStream,
                'editor' => $assocaie,
                'name' => '',
                'email' => '',
                'password' => '',
                'mobile' => '',
                'web' => '',
                'role' => '',
                'status' => '',
                'college' => '',
                'detail' => '',
                'sid' => '',

                'stream_err' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'mobile_err' => '',
                'role_err' => '',
                'web_err' => '',
                'status_err' => '',
                'college_err' => '',
                'detail_err' => ''
            ];

            $this->view('admins/updateEditor', $data);
        }
    }
    public function reviewerDetail()
    {
        $rid = $_GET['rid'];
        $reviwer = $this->editorModel->getReviweDetial($rid);
        $data = [
            'view' =>  $reviwer
        ];
        $this->view('admins/reviewerDetail', $data);
    }
    public function reviewer()
    {

        $reviwer = $this->editorModel->getReviwe();
        $data = [
            'view' =>  $reviwer
        ];
        $this->view('admins/reviewer', $data);
    }
    public function addReviewer()
    {

        $reviwer = $this->editorModel->getReviwe();
        $data = [
            'view' =>  $reviwer
        ];
        $this->view('admins/addReviewer', $data);
    }

    public function updateReviewere()
    {
        $id = $_GET['ID'];
        $assocaie = $this->adminModel->editEditor($id);
        $journalsId = $this->loginModel->getJournals();
        $allStream = $this->loginModel->stream();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'journalId' => $journalsId,
                'title' => 'test Us',
                'stream' => $allStream,
                'name' => rim($_POST['name']),
                'email' => rim($_POST['email']),
                'mobile' => rim($_POST['mobile']),
                'web' => rim($_POST['weblink']),
                'status' => rim($_POST['status']),
                'college' => rim($_POST['college_name']),
                'detail' => rim($_POST['Detail']),
                'id' => $id,
                'sid' => trim($_POST['sid']),
                'stream_err' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'mobile_err' => '',
                'web_err' => '',
                'status_err' => '',
                'college_err' => '',
                'detail_err' => ''
            ];
            if (empty($data["id"])) {
                $data["id_err"] = "Stream name is required";
            }
            if (empty($data["name"])) {
                $data["name_err"] = "Name is required";
            }
            if (empty($data["email"])) {
                $data["email_err"] = "email is required";
            }
            if ($this->adminModel->$data['email']) {
                $data["email_err"] = "email is alreday registred";
            }

            if (empty($data["mobile"])) {
                $data["mobile_err"] = "mobile no is required";
            }

            if (empty($data["status"])) {
                $data["status_err"] = "Status is required";
            }
            if (empty($data["college"])) {
                $data["college_err"] = "college_name is required";
            }
            if (empty($data["detail"])) {
                $data["detail_err"] = "Details is required";
            }
            // Make sure errors are empty
            if (
                empty($data['email_err']) && empty($data['name_err'])  && empty($data['id_err']) &&
                empty($data['status_err']) && empty($data['mobile_err']) && empty($data['college_err'])
            ) {

                if ($this->adminModel->updateReviewer($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('admins/viewReviewer');
                } else {
                    die('Something went wrong');
                }
            } else
                $this->view('admins/updateReviewere', $data);
        } else {
            $data = [
                'journalId' => $journalsId,
                'title' => 'test Us',
                'stream' => $allStream,
                'editor' => $assocaie,
                'name' => '',
                'email' => '',
                'password' => '',
                'mobile' => '',
                'web' => '',
                'role' => '',
                'status' => '',
                'college' => '',
                'detail' => '',
                'sid' => '',

                'stream_err' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'mobile_err' => '',
                'role_err' => '',
                'web_err' => '',
                'status_err' => '',
                'college_err' => '',
                'detail_err' => ''
            ];

            $this->view('admins/updateReviewere', $data);
        }
    }
    public function viewReviewer()
    {

        $reviwer = $this->editorModel->getReviwer();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'view' =>  $reviwer,
                'bid' => rim($_POST['bid']),
            ];
            if (empty($data['bid'])) {
                $data['bid_err'] = "journal name is required";
            }
            if (empty($data['bid_err'])) {
                if ($this->editorModel->deleteReviewer($data)) {
                    flash('delete_success', 'You are Delete the data');
                    redirect('admins/viewReviewer');
                } else {
                    die('Something went wrong');
                }
            } else
                $this->view('admins/viewReviewer', $data);
        } else {
            $data = [
                'view' =>  $reviwer
            ];
            $this->view('admins/viewReviewer', $data);
        }
        $data = [
            'view' =>  $reviwer
        ];
        $this->view('admins/viewReviewer', $data);
    }
    public function paperStatus()
    {
        $aid = $_GET['aid'];
        $Paper = $this->editorModel->getPaperDetail($aid);
        $data = [
            'authorsPaper' => $Paper
        ];
        $this->view('admins/paperStatus', $data);
    }
    public function viewAuthDetails()
    {
        $aid = $_GET['aid'];
        $authorPaper = $this->editorModel->getAuthPaper($aid);
        $data = [
            'aid' => $aid,
            'authorPaper' => $authorPaper
        ];
        $this->view('admins/viewAuthDetails', $data);
    }
    public function viewAuthor()
    {
        $author = $this->editorModel->getAuthor();
        $data = [
            'author' => $author
        ];
        $this->view('admins/viewAuthor', $data);
    }
    public function addAssociates()
    {
        $stream = $this->editorModel->getStream();
        $journal = $this->editorModel->getJournalByStream();
        $assocaie = $this->editorModel->getAsEditor();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'stream' => $stream,
                'associate' => $assocaie,
                'journal' => $journal,
                'sid' => rim($_POST["sid"]),
                'name' => rim($_POST["name"]),
                'email' => rim($_POST["email"]),
                'confirm_password' => rim($_POST["confirm_password"]),
                'mobile' => rim($_POST["mobile"]),
                'role' => rim($_POST["role"]),
                'status' => rim($_POST["status"]),
                'college' => rim($_POST["college_name"]),
                'detail' => rim($_POST["Detail"]),
                'web' => rim($_POST['weblink']),
                'password' => rim($_POST['password']),
                'sid_err' => '',
                'name_err' => '',
                'email_err' => '',
                'confirm_password_err' => '',
                'mobile_err' => '',
                'role_err' => '',
                'status_err' => '',
                'college_err' => '',
                'web_err' => '',
                'password_err' => '',
                'detail_err' => ''
            ];
            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Pleae enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }
            if (empty($data["pwd1"])) {
                $data['pwd1_err'] = "email is required";
            }
            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Pleae confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            if (empty($data['web'])) {
                $data['web_err'] = "link is required";
            }

            if (empty($data["sid"])) {
                $data['sid_err'] = "Stream Name is required";
            }
            if (empty($data["name"])) {
                $data['name_err'] = "Name is required";
            }
            if (empty($data["email"])) {
                $data['email_err'] = "email is required";
            }

            if (empty($data["mobile"])) {
                $data['mobile_err'] = "mobile no is required";
            }
            if (empty($data["role"])) {
                $data['role_err'] = "Role is required";
            }
            if (empty($data["status"])) {
                $data['status_err'] = "Status is required";
            }
            if (empty($data['college'])) {
                $data['college_err'] = "college_name is required";
            }
            if (empty($data["detail"])) {
                $data['detail_err'] = "Details is required";
            }
            if (
                empty($data['sid_err']) && empty($data['name_err']) &&
                empty($data['email_err']) && empty($data['password_err']) &&
                empty($data['mobile_err']) && empty($data['role_err']) &&
                empty($data['status_err']) && empty($data['college_err']) && empty($data['detail_err'])
            ) {  // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->editorModel->addAssociate($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('admins/viewAssociate');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admins/addAssociates', $data);
            }
        } else {
            $data = [
                'stream' => $stream,
                'associate' => $assocaie,
                'journal' => $journal,
                'sid' => '',
                'name' => '',
                'email' => '',
                'confirm_password' => '',
                'mobile' => '',
                'role' => '',
                'status' => '',
                'college' => '',
                'detail' => '',
                'web' => '',
                'password' => '',
                'sid_err' => '',
                'name_err' => '',
                'email_err' => '',
                'confirm_password_err' => '',
                'mobile_err' => '',
                'role_err' => '',
                'status_err' => '',
                'college_err' => '',
                'detail_err' => '',
                'web_err' => '',
                'password_err' => ''
            ];

            $this->view('admins/addAssociates', $data);
        }
        $this->view('admins/addAssociates', $data);
    }

    public function viewAssociate()
    {
        $journal = $this->editorModel->getJournalByStream();
        $assocaie = $this->editorModel->getAsEditor();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'associate' => $assocaie,
                'journal' => $journal,
                'bid' => rim($_POST['bid']),
            ];
            if (empty($data['bid'])) {
                $data['bid_err'] = "Editor name is required";
            }
            if (empty($data['bid_err'])) {
                if ($this->editorModel->deleteAssociate($data)) {
                    flash('delete_success', 'You are Delete the data');
                    redirect('admins/viewAssociate');
                } else {
                    die('Something went wrong');
                }
            } else
                $this->view('admins/viewAssociate', $data);
        } else {
            $data = [
                'associate' => $assocaie,
                'journal' => $journal
            ];
            $this->view('admins/viewAssociate', $data);
        }

        $this->view('admins/viewAssociate', $data);
    }
    public function viewEditor()
    {
        $journal = $this->loginModel->getJournals();
        $assocaie = $this->adminModel->getEditor();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'associate' => $assocaie,
                'journal' => $journal,
                'bid' => rim($_POST['bid']),
            ];
            if (empty($data['bid'])) {
                $data['bid_err'] = "Editor name is required";
            }
            if (empty($data['bid_err'])) {
                if ($this->adminModel->deleteEditor($data)) {
                    flash('delete_success', 'You are Delete the data');
                    redirect('admins/viewEditor');
                } else {
                    die('Something went wrong');
                }
            } else
                $this->view('admins/viewEditor', $data);
        } else {
            $data = [
                'associate' => $assocaie,
                'journal' => $journal
            ];
            $this->view('admins/viewEditor', $data);
        }

        $this->view('admins/viewEditor', $data);
    }
    public function addIssueDate()
    {
        $journal = $this->editorModel->getJournalByStream();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'journal' => $journal,
                'date' => rim($_POST["date"]),
                'date2' => rim($_POST["date2"]),
                'date_err' => '',
                'date2_err' => ''
            ];
            if (empty($data['date'])) {
                $data['date_err'] = "date is required";
            }
            if (empty($data['date2'])) {
                $data['date2_err'] = "date is required";
            }
            if (!empty($data["date"]) && !empty($data["date2"])) {

                // $test = explode('/', $d);
                // $test1 = explode('/', $d2);
                // if (checkdate($test[0], $test[1], $test[2]) && checkdate($test1[0], $test1[1], $test1[2])) {
                if ($this->editorModel->addNextDate($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('admmins/viewIssue');
                } else {
                    die('Something went wrong');
                }
                // } else {
                //     echo '<script>alert("string not aloud please enter vald date");</script>';
                // }
            } else {
                $this->view('admins/addIssueDate', $data);
            }
        } else {
            $data = [
                'journal' => $journal,
                'date' => '',
                'date2' => '',
                'date_err' => '',
                'date2_err' => ''
            ];

            $this->view('admins/addIssueDate', $data);
        }
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
                    redirect('admins/viewIssue');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admins/addIssue', $data);
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
            $this->view('admins/addIssue', $data);
        }
    }
    public function viewIssue()
    {
        $issue = $this->editorModel->issue();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['as'];
            if ($this->editorModel->deleteIssue($id)) {
                flash('post_message', 'Post Removed');
                redirect('admins/viewIssue&er=y');
            } else {
                die('Something went wrong');
            }
        } else {
            $data = [
                'issue' => $issue
            ];
            $this->view('admins/viewIssue', $data);
        }
    }
    public function addJournal()
    {
        $stream = $this->loginModel->stream();
        $journal = $this->editorModel->getJournalByStream();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'stream' => $stream,
                'journal' => $journal,
                'name' => rim($_POST['journal_name']),
                'jAbb' => rim($_POST['journal_n_abb']),
                'status' => rim($_POST['status']),
                'sid' => rim($_POST["Stream_id"]),
                'jP' => rim($_POST['j_issn_p']),
                'jE' => rim($_POST['j_issn_e']),
                'frequency' => rim($_POST['frequency']),

                'name_err' => '',
                'jAbb_err' => '',
                'status_err' => '',
                'sid_err' => '',
                'jP_err' => '',
                'jE_err' => '',
                'frequency_err' => ''

            ];

            if (empty($data['name'])) {
                $data['name_err'] = "journal name is required";
            }
            if (empty($data['jAbb'])) {
                $data['jAbb_err'] = "Abbervation is required";
            }
            if (empty($data['status'])) {
                $data['status_err'] = "status is required";
            }
            if (empty($data['jP'])) {
                $data['jP_err'] = "print is required";
            }
            if (empty($data['jE'])) {
                $data['jE_err'] = "online is required";
            }
            if (empty($data['frequency'])) {
                $data['frequency_err'] = "frequency is required";
            }
            if (empty($data['sid'])) {
                $data['sid_err'] = "stream is required";
            }
            if (
                empty($data['name_err']) && empty($data['jAbb_err']) &&
                empty($data['status_err']) && empty($data['sid_err']) &&
                empty($_POST['jP_err']) && empty($_POST['jE_err']) &&
                empty($_POST['frequency_err'])
            ) {
                if ($this->editorModel->addJournal($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('admins/viewJournal');
                } else {
                    die('Something went wrong');
                }
            } else
                $this->view('admins/addJournal', $data);
        } else {
            $data = [
                'stream' => $stream,
                'journal' => $journal,
                'name' => '',
                'jAbb' => '',
                'status' => '',
                'sid' => '',
                'frequency' => '',
                'name_err' => '',
                'jAbb_err' => '',
                'status_err' => '',
                'sid_err' => '',
                'jP_err' => '',
                'jE_err' => '',
                'frequency' => ''
            ];
            $this->view('admins/addJournal', $data);
        }
    }

    public function updateAssociate()
    {
        $id = $_GET['ID'];
        $stream = $this->editorModel->getStream();
        $journal = $this->editorModel->getJournalByStream();
        $assocaie = $this->editorModel->getAsEditorByID($id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'stream' => $stream,
                'associate' => $assocaie,
                'journal' => $journal,
                'bid' => $id,
                'sid' => rim($_POST["sid"]),
                'name' => rim($_POST["name"]),
                'email' => rim($_POST["email"]),
                'confirm_password' => rim($_POST["confirm_password"]),
                'mobile' => rim($_POST["mobile"]),
                'status' => rim($_POST["status"]),
                'college' => rim($_POST["college_name"]),
                'detail' => rim($_POST["Detail"]),
                'web' => rim($_POST['weblink']),
                'sid_err' => '',
                'name_err' => '',
                'email_err' => '',
                'confirm_password_err' => '',
                'mobile_err' => '',
                'role_err' => '',
                'status_err' => '',
                'college_err' => '',
                'web_err' => '',
                'password_err' => '',
                'detail_err' => ''
            ];
            // Validate Password
            // if (empty($data['password'])) {
            //     $data['password_err'] = 'Pleae enter password';
            // } elseif (strlen($data['password']) < 6) {
            //     $data['password_err'] = 'Password must be at least 6 characters';
            // }
            // if (empty($data["pwd1"])) {
            //     $data['pwd1_err'] = "email is required";
            // }
            // // Validate Confirm Password
            // if (empty($data['confirm_password'])) {
            //     $data['confirm_password_err'] = 'Pleae confirm password';
            // } else {
            //     if ($data['password'] != $data['confirm_password']) {
            //         $data['confirm_password_err'] = 'Passwords do not match';
            //     }
            // }
            if (empty($data['web'])) {
                $data['web_err'] = "link is required";
            }

            if (empty($data["sid"])) {
                $data['sid_err'] = "Stream Name is required";
            }
            if (empty($data["name"])) {
                $data['name_err'] = "Name is required";
            }
            if (empty($data["email"])) {
                $data['email_err'] = "email is required";
            }

            if (empty($data["mobile"])) {
                $data['mobile_err'] = "mobile no is required";
            }
            // if (empty($data["role"])) {
            //     $data['role_err'] = "Role is required";
            // }
            if (empty($data["status"])) {
                $data['status_err'] = "Status is required";
            }
            if (empty($data['college'])) {
                $data['college_err'] = "college_name is required";
            }
            if (empty($data["detail"])) {
                $data['detail_err'] = "Details is required";
            }
            if (
                empty($data['sid_err']) && empty($data['name_err']) &&
                empty($data['email_err'])  && empty($data['mobile_err'])  &&
                empty($data['status_err']) && empty($data['college_err']) && empty($data['detail_err'])
            ) {  // Hash Password

                if ($this->editorModel->updateAssoc($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('admins/viewAssociate');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admins/updateAssociate', $data);
            }
        } else {
            $data = [
                'stream' => $stream,
                'associate' => $assocaie,
                'journal' => $journal,
                'sid' => '',
                'name' => '',
                'email' => '',
                'confirm_password' => '',
                'mobile' => '',
                'role' => '',
                'status' => '',
                'college' => '',
                'detail' => '',
                'web' => '',
                'password' => '',
                'sid_err' => '',
                'name_err' => '',
                'email_err' => '',
                'confirm_password_err' => '',
                'mobile_err' => '',
                'role_err' => '',
                'status_err' => '',
                'college_err' => '',
                'detail_err' => '',
                'web_err' => '',
                'password_err' => ''
            ];

            $this->view('admins/updateAssociate', $data);
        }
        $this->view('admins/updateAssociate', $data);
    }
    public function editIssue()
    {
        $id = $_GET['ID'];
        $results = $this->editorModel->editIssues($id);
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
                if ($this->editorModel->updateIssues($data)) {
                    redirect('admins/viewIssue');
                } else {
                    die('domthing went wrong!!!!');
                }
            } else {
                //load error
                $this->view('admins/editIssue', $data);
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
        $this->view('admins/editIssue', $data);
    }
    public function viewJournal()
    {
        $journal = $this->editorModel->getJournalByStream();
        $stream = $this->loginModel->stream();
        $journal = $this->editorModel->getJournalByStream();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'stream' => $stream,
                'journal' => $journal,
                'bid' => rim($_POST['bid']),
            ];
            if (empty($data['bid'])) {
                $data['bid_err'] = "journal name is required";
            }
            if (empty($data['bid_err'])) {
                if ($this->editorModel->deleteJournal($data)) {
                    flash('delete_success', 'You are Delete the data');
                    redirect('admins/viewJournal');
                } else {
                    die('Something went wrong');
                }
            } else
                $this->view('admins/viewJournal', $data);
        } else {
            $data = [
                'stream' => $stream,
                'journal' => $journal,
            ];
            $this->view('admins/viewJournal', $data);
        }
        $this->view('admins/viewJournal', $data);
    }
    public function register()
    {

        $data = [
            'header-title' => 'Channel for touching the hights of the sky.',
            'title' => 'Welcome to Vidya Publications'
        ];

        $this->view('admins/register', $data);
    }
    public function addEditors()
    {
        $journalsId = $this->loginModel->getJournals();
        $allStream = $this->loginModel->stream();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'journalId' => $journalsId,
                'title' => 'test Us',
                'stream' => $allStream,
                'name' => rim($_POST['name']),
                'email' => rim($_POST['email']),
                'password' => rim($_POST['pwd1']),
                'mobile' => rim($_POST['mobile']),
                'web' => rim($_POST['weblink']),
                'role' => trim($_POST['role']),
                'status' => rim($_POST['status']),
                'college' => rim($_POST['college_name']),
                'detail' => rim($_POST['Detail']),
                'sid' => trim($_POST['sid']),

                'stream_err' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'mobile_err' => '',
                'role_err' => '',
                'web_err' => '',
                'status_err' => '',
                'college_err' => '',
                'detail_err' => ''
            ];
            if (empty($data["sid"])) {
                $data["sid_err"] = "Stream name is required";
            }
            if (empty($data["name"])) {
                $data["name_err"] = "Name is required";
            }
            if (empty($data["email"])) {
                $data["email_err"] = "email is required";
            }
            if ($this->adminModel->findEditorByEmail($data['email'])) {
                $data["email_err"] = "email is alreday registred";
            }
            if (empty($data["password"])) {
                $data["password_err"] = "password is required";
            }
            if (empty($data["mobile"])) {
                $data["mobile_err"] = "mobile no is required";
            }
            if (empty($data["role"])) {
                $data["role_err"] = "Role is required";
            }
            if (empty($data["status"])) {
                $data["status_err"] = "Status is required";
            }
            if (empty($data["college"])) {
                $data["college_err"] = "college_name is required";
            }
            if (empty($data["detail"])) {
                $data["detail_err"] = "Details is required";
            }
            // Make sure errors are empty
            if (
                empty($data['email_err']) && empty($data['name_err']) &&
                empty($data['password_err']) && empty($data['sid_err']) &&
                empty($data['role_err']) && empty($data['status_err'])
                && empty($data['mobile_err']) && empty($data['college_err'])
            ) {
                // Validated
                // Check for user/email

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->loginModel->register($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('admins/home');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('admins/addEditors', $data);
            }
        } else {
            $data = [
                'journalId' => $journalsId,
                'title' => 'test Us',
                'stream' => $allStream,
                'name' => '',
                'email' => '',
                'password' => '',
                'mobile' => '',
                'web' => '',
                'role' => '',
                'status' => '',
                'college' => '',
                'detail' => '',
                'sid' => '',

                'stream_err' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'mobile_err' => '',
                'role_err' => '',
                'web_err' => '',
                'status_err' => '',
                'college_err' => '',
                'detail_err' => ''
            ];


            $this->view('admins/addEditors', $data);
        }
    }
    public function home()
    {

        $data = [];
        $this->view('admins/home', $data);
    }
    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                // 'journalId' => $journalsId,
                'email' => trim($_POST['email']),
                'password' => ($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Pleae enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
            // Validate Password
            if (0 <  strlen($data['password']) && strlen($data['password']) < 6) {
                $data['password_err'] = ' password length is less than 6';
            }
            // Check for user/email
            if ($this->adminModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }
            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                // $data['password']s =  password_hash($data['password'], PASSWORD_DEFAULT);
                $loggedInUser = $this->adminModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Create Session
                    $this->createAdminSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('admins/index', $data);
                }
            } else {
                // Load view with errors
                $this->view('admins/index', $data);
            }
        } else {
            // Init data
            $data = [
                // 'journalId' => $journalsId,
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('admins/index', $data);
        }
        $this->view('admins/index', $data);
    }
    public function createAdminSession($user)
    {
        $id = getId();
        $_SESSION['user_id'] = $user->adminId;
        $_SESSION['user_email'] = $user->email;
        redirect('admins/home&id=' . $user->email);
    }
    public function logout()
    {
        $id = getId();
        unset($_SESSION['ADMIN_ID']);
        unset($_SESSION['USER_ID']);
        session_destroy();
        redirect('admins/index');
    }
}
