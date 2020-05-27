<?php
class Pages extends Controller
{
  public function __construct()
  {

    $this->pageModel = $this->model('Page');
  }
  // Advance Seach
  public function adSerach()
  {
    if (!isGet()) {
      // redirect('index');
    }

    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);
    $j = $this->pageModel->getPages();
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form

      $flag = 0;
      if (isset($_POST['search'])) {

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
          'journ' => $j,
          'journalId' => $journalsId,
          'name' => $_POST['NOA'],
          'email' => $_POST['email'],
          'institude' => $_POST['institude_name'],
          'city' => $_POST['city'],
          'state' => $_POST['state'],
          'title' => $_POST['title'],
          'keyword' => $_POST['keyword'],
          'jname' => $_POST['journalName'],
          'volume' => $_POST['vo_no'],
          'issue' => $_POST['iss_ye'],
          'flag' => '1',
          'result'
        ];

        if (
          empty($data['name']) && empty($data['email']) && empty($data['institude']) && empty($data['city']) && empty($data['state']) &&
          empty($data['title']) && empty($data['keyword']) && empty($data['jname']) && empty($data['volume']) && empty($data['issue'])
        ) {
          echo "<script> alert('Fields Are Empty');</script>";
          $data['flag'] = '0';
        } else {
          $data['flag'] = '1';
          // if (!empty($data['name'])) {
          $data['result']    = $this->pageModel->search($data);
          // }
          // Load view
          $this->view('pages/adSerach', $data);
        }
      }
    } else {
      // Init data
      $data = [
        'journ' => $j,
        'journalId' => $journalsId,
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'flag' => '0'
      ];

      // Load view
      $this->view('pages/adSerach', $data);
    }
    $data = [

      'journalId' => $journalsId
    ];
    $this->view('pages/adSerach', $data);
  }
  //specialIssuesGuid
  public function specialIssuesGuid()
  {
    if (!isGet()) {
      // redirect('index');
    }
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);

    $data = [

      'journalId' => $journalsId
    ];
    $this->view('pages/specialIssuesGuid', $data);
  }
  //advisoryboard
  public function advisoryboard()
  {
    if (!isGet()) {
      // redirect('index');
    }
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);

    $data = [

      'journalId' => $journalsId
    ];
    $this->view('pages/advisoryboard', $data);
  }
  //pdf
  public function ethics()
  {
    if (!isGet()) {
      // redirect('index');
    }
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);

    $data = [

      'journalId' => $journalsId
    ];
    $this->view('pages/ethics', $data);
  }
  //editor
  public function editor()
  {
    if (!isGet()) {
      // redirect('index');
    }
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);
    $editor = $this->pageModel->getEditiorByStream();
    $associate = $this->pageModel->getAssEditiorBy($id);
    $data = [
      'associate' => $associate,
      'editor' => $editor,
      'title' => 'title',
      'journalId' => $journalsId
    ];
    $this->view('pages/editor', $data);
  }
  //reviwer
  public function reviewer()
  {
    if (!isGet()) {
      redirect('index');
    }
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);
    $post = $this->pageModel->getPost($id);
    $special = $this->pageModel->getSpecial($id);
    $paper = $this->pageModel->getCallForPaper();
    $data = [
      'journalId' => $journalsId,
      'special' => $special,
      'paper' => $paper,
      'header-title' => 'Channel for touching the hights of the sky.'
    ];

    $this->view('pages/reviewer', $data);
  }
  //call for paper
  public function callForPaper()
  {
    if (!isGet()) {
      redirect('index');
    }
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);
    $post = $this->pageModel->getPost($id);
    $special = $this->pageModel->getSpecial($id);
    $paper = $this->pageModel->getCallForPaper();
    $data = [
      'journalId' => $journalsId,
      'special' => $special,
      'paper' => $paper,
      'header-title' => 'Channel for touching the hights of the sky.'
    ];
    $this->view('pages/callForPaper', $data);
  }
  //special Issue
  public function specialIssue()
  {
    if (!isGet()) {
      redirect('index');
    }
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);
    $post = $this->pageModel->getPost($id);
    $special = $this->pageModel->getSpecial($id);
    $data = [
      'journalId' => $journalsId,
      'special' => $special,
      'header-title' => 'Channel for touching the hights of the sky.'
    ];
    $this->view('pages/specialIssue', $data);
  }
  //Post Issue Description
  public function IssueDescription()
  {
    if (!isGet()) {
      redirect('index');
    }
    $iss = $_GET['IID'];
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);
    $st = $this->pageModel->assignment($iss);
    $data = [
      'journalId' => $journalsId,
      'header-title' => 'Channel for touching the hights of the sky.',
      'iss' => $st
    ];
    $this->view('pages/IssueDescription', $data);
  }
  //Post Issue
  public function postIssue()
  {
    if (!isGet()) {
      redirect('index');
    }
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);
    $post = $this->pageModel->getPost($id);
    $data = [
      'journalId' => $journalsId,
      'posts' => $post,
      'header-title' => 'Channel for touching the hights of the sky.'
    ];
    $this->view('pages/postIssue', $data);
  }
  //Home page
  public function home()
  {
    if (!isGet()) {
      redirect('index');
    }
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);
    $editor = $this->pageModel->getEditiorByStream();
    $stream = $this->pageModel->getStream();
    $assciat = $this->pageModel->getAssEditiorBy($id);
    $news = $this->pageModel->getNews($id);
    $absreact = $this->pageModel->getAbstract();
    $data = [
      'journalId' => $journalsId,
      'header-title' => 'Channel for touching the hights of the sky.',
      'Editor' => $editor,
      'streamsJournal' => $stream,
      'news' => $news,
      'abstract' => $absreact,
      'assciate' => $assciat,
      'title' => 'About Us',
      'description' => 'App to share posts with other users',
      'aim' => 'The main aim of the journal is to provide a platform to researchers from
      Engineering Streams (Computer / I.T., Mechanical and Electronics)
      to present their high quality research work and innovation in the form original, unpublished research paper.'
    ];

    $this->view('pages/home', $data);
  }
  //first pase
  public function index()
  {
    // Get page
    $posts = $this->pageModel->getPages();
    $data = [
      'header-title' => 'Channel for touching the hights of the sky.',
      'title' => 'Welcome to Vidya Publications',
      'description' => 'Vidya Publications is an independent publisher specializing in the publication of high-impact journals, 
      proceedings and books, in both printed and online versions, across all areas of engineering, 
      science, humanities, arts etc. 
      We are aiming to the leading scientific publisher and publish an expanding academic research content programme.',
      'page' => $posts
    ];

    $this->view('pages/index', $data);
  }
  //admin details
  public function contactUs()
  {
    if (!isGet()) {
      redirect('index');
    }
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);
    $manger = $this->pageModel->getManger();
    $editor = $this->pageModel->getEditiorByStream();
    $data = [
      'journalId' => $journalsId,
      'manager' => $manger,
      'editor' => $editor,
      'header-title' => 'Channel for touching the hights of the sky.'
    ];
    $this->view('pages/contactUs', $data);
  }
  public function admins()
  {
    $id = getId();
    $journalsId = $this->pageModel->getJournalsById($id);
    $data = [
      'journalId' => $journalsId,
      'title' => 'test Us',
      'description' => 'App to share posts with other users'
    ];

    $this->view('pages/admins', $data);
  }
}
