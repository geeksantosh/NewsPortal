<?php 
session_start();
error_reporting(0);
include('includes/config.php');

    ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="ElightTechnical | New way to Learn" content="TECHNOLOGY UPDATES, SEO, TIPS, TRICKS, SECURITY UPDATES, REVIEWS ALL ABOUT TECHNOLOGY ">
    <meta name="author" content="Santosh Adhikari">

    <title>ElightTechnical | Category  Page</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

   <?php include('includes/header.php');?>

    <div class="container">

      <div class="row" style="margin-top: 4%">

        <div class="col-md-8">

<?php 
        if($_GET['catid']!=''){
$_SESSION['catid']=intval($_GET['catid']);
}
             

     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"
SELECT    tblposts.id        AS pid, 
          tblposts.posttitle AS posttitle, 
          tblposts.postimage, 
          tblcategory.categoryname   AS category, 
          tblsubcategory.subcategory AS subcategory, 
          tblposts.postdetails       AS postdetails, 
          tblposts.postingdate       AS postingdate, 
          tblposts.posturl           AS url 
FROM      tblposts 
LEFT JOIN tblcategory 
ON        tblcategory.id=tblposts.categoryid 
LEFT JOIN tblsubcategory 
ON        tblsubcategory.subcategoryid=tblposts.subcategoryid 
WHERE     tblposts.categoryid='".$_SESSION['catid']."' 
AND       tblposts.is_active = 0 
ORDER BY  tblposts.id DESC 
LIMIT     $offset, $no_of_records_per_page
  ");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "No record found";
}
else {
while ($row=mysqli_fetch_array($query)) {


?>
<h1><?php echo htmlentities($row['category']);?> News</h1>
          <div class="card mb-4">
       <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['postimage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
           
              <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo htmlentities($row['postingdate']);?>
           
            </div>
          </div>
<?php } ?>

    <ul class="pagination justify-content-center mb-4">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>
<?php } ?>
       



        </div>

      <?php include('includes/sidebar.php');?>
      </div>

    </div>

      <?php include('includes/footer.php');?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 
</head>
  </body>

</html>
