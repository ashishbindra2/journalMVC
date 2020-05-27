
<?php
error_reporting(0);
$host="localhost";
$user="root";
$pass="";
$dbname="punjabiuni1";
$datatable = "paperstatus&pos";

function highlight_word( $content, $word) {
    $replace = '<span style="background-color: #FF0;">' . $word . '</span>'; // create replacement
    $content = str_replace( $word, $replace, $content ); // replace content
    return $content; // return highlighted data
}
?>
<form action="Copy.php" method="get">
Search: <input type="text" name="findme" value="<?php echo $_GET["findme"]; ?>" /><input type="submit" value="Search" />
<input name="show" type="radio" value="1"<?php if ($_GET["show"]=='1' or !isset($_GET["show"])) echo ' checked="checked"'; ?> />Show all news 
<input name="show" type="radio" value="2"<?php if ($_GET["show"]=='2') echo ' checked="checked"'; ?> />Show news that match search criteria
</form>
<?php
// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  
if ($_GET["show"]=='2') {
    $sql = "SELECT * FROM ".$datatable." WHERE content LIKE '%".$conn->real_escape_string($_GET["findme"])."%'";
} else {
    $sql = "SELECT * FROM ".$datatable;
}
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($_GET["findme"]<>'') {
            echo highlight_word($row["content"], $_GET["findme"]);
        } else {
                        echo $row["content"];
        }
        echo "<hr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>