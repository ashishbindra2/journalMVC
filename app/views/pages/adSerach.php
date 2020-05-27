<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="main">

   <div class="heading bg-light pt-2 pb-2">
      <h2 class="h1 text-center">Advanced Search</h2>
   </div>
   <div class="container">
      <form action="<?php echo URLROOT . 'pages/adSerach&id=' . $data["journalId"]->JOURNAL_ID; ?>" method="POST">
         <div class="col-sm-2">
         </div>
         <div class="col-sm-10 px-auto">
            <div class="form-label-group mt-2">
               <input type="text" id="name" name="NOA" class="form-control" placeholder="Author Name" autofocus>
            </div>
            <div class="form-label-group mt-2">
               <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-label-group mt-2">
               <input type="text" name="institude_name" placeholder="Institute Name" class="form-control">
            </div>
            <div class="form-label-group mt-2">
               <input type="text" name="city" class="form-control" placeholder="City">
            </div>
            <div class="form-label-group mt-2">
               <input type="text" name="state" placeholder="State" class="form-control">
            </div>
            <div class="form-label-group mt-2">
               <input type="text" name="title" placeholder="Title of Paper" class="form-control">
            </div>
            <div class="form-label-group mt-2">
               <input type="text" name="keyword" placeholder="Keyword Related To Paper" class="form-control">
            </div>
            <div class="form-label-group mt-2">
               <input type="text" name="vo_no" placeholder="Volume Number" class="form-control">
            </div>
            <div class="form-label-group mt-2">
               <input type="text" name="iss_ye" placeholder="Issue Year" class="form-control">
            </div>
            <div class="form-label-group mt-2">
               <select class="form-control" name="journalName">
                  <option value="">Please select a journal</option>
                  <?php foreach ($data['journ'] as $journal) : ?>
                     <option value='<?php echo $journal->JOURNAL_NAME; ?>'> <?php echo $journal->JOURNAL_NAME; ?> </option>
                  <?php endforeach;  ?>
               </select>
            </div>
            <div class="form-label-group mt-2">
               <input type="submit" name="search" value=" Filter " class="btn btn-lg btn-primary">
            </div>
         </div>
         <div class="table-responsive-md">

            <h1 align='center'>Search Result</h1>
            <table class="table  table-hover">
               <caption>Result of Search</caption>
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">S.NO</th>
                     <th scope="col">Author Name </th>
                     <th scope="col">Paper Name/Title </th>
                     <th scope="col">Volume Number </th>
                     <th scope="col">Year</th>
                     <th scope="col">Journal</th>
                  </tr>
               </thead>
               <tbody>
                  <?php

                  if ($data['flag'] == '1') {
                     $q = 1;
                     foreach ($data['result'] as $result) :
                  ?>
                        <tr>
                           <th scope='row'><?php echo $q; ?></th>
                           <td><?php echo $result->FNAME; ?></td>
                           <td><u> <a href="<?php echo $result->PAPER_PATH; ?>"><?php echo $result->TITLE . '<br>'; ?></a></u></td>

                           <td><a href="#"><?php echo "VOLUME" . $result->VOLUME_NO . " "; ?></a></td>
                           <td><?php echo $result->ISSUE_YEAR; ?></td>
                           <td><?php echo $result->JOURNAL_NAME; ?></td>
                        </tr><?php $q++;
                           endforeach;
                        } else { ?>
                     <tr>
                        <th scope='row'>#</th>
                        <td></td>
                        <td><u> </u></td>

                        <td></td>
                        <td></td>
                        <td></td>
                     </tr> <?php } ?>
               </tbody>
            </table>
         </div>
      </form>

   </div>

</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>