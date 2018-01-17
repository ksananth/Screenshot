<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Journey</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="HTML5 website template">
  <meta name="keywords" content="global, template, html, sass, jquery">
  <meta name="author" content="Bucky Maler">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
    <?php
      	$path="images/";
      	$dir = new DirectoryIterator($path);
      	$folderArray = array();
        $screenArray = array();
        $count = 0;

        //Looping Main Folder (Screens)
      	foreach ($dir as $fileinfo) {
            if ($fileinfo->isDir() && !$fileinfo->isDot()) {
              
              array_push($folderArray,$fileinfo->getFilename());

              $screenArray[$count] = array();
              $screenArray[$count]['screenName'] = $fileinfo->getFilename();
              $screenArray[$count]['languages'] = array();
              $screenArray[$count]['imagesURL'] = array();


              //Looping Sub Folder (Languages)
              $subFolderpath="images/".$fileinfo->getFilename();
              $subFolderdir = new DirectoryIterator($subFolderpath);
              foreach ($subFolderdir as $subFolderInfo) {
                if ($subFolderInfo->isDir() && !$subFolderInfo->isDot()) {

                  array_push($screenArray[$count]['languages'],$subFolderInfo->getFilename());
                  $screenArray[$count]['imagesURL'][$subFolderInfo->getFilename()] = array();
                  

                      $folder_path =  "images/".$fileinfo->getFilename()."/".$subFolderInfo->getFilename()."/*.*";
                      $files = glob( $folder_path);
         
                       //Loop all images in folder
                        for ($i=0; $i<count($files); $i++)
                        {
                          $image = $files[$i];
                          $supported_file = array(
                             'gif',
                             'jpg',
                             'jpeg',
                             'png'
                          );
               
                          $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                          if (in_array($ext, $supported_file)) {
                            array_push($screenArray[$count]['imagesURL'][$subFolderInfo->getFilename()],$image);
                              //echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
                              //echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";
                            } else {
                                continue;
                            }
                          }
                          // inner loop

                }
              }
              $count++;
            }
          }
          sort($screenArray);
          //SAMPLE for loop
        //print_r($screenArray);
          
        foreach ($screenArray as &$value) {
          
           foreach ($value['languages'] as &$language) {
    
              foreach ($value['imagesURL'][$language] as &$image) {
                //print_r($image);
              }
}
           
        }

    ?>

<!-- notification for small viewports and landscape oriented smartphones -->
<div class="device-notification">
  <a class="device-notification--logo" href="#0">
    <img src="assets/img/ic_launcher_customer.png" alt="Global">
    <p>Become a Retail Customer</p>
  </a>
</div>

<div class="perspective effect-rotate-left">
  <div class="container"><div class="outer-nav--return"></div>
    <div id="viewport" class="l-viewport">
      <div class="l-wrapper">
        <header class="header">
          <a class="header--logo" href="#0">
            <img src="assets/img/ic_launcher_customer.png" alt="Global">
            <p>Become a Retail Customer</p>
          </a>
         
          <div class="header--nav-toggle">
            <span></span>
          </div>
        </header>
        <nav class="l-side-nav">
          <ul class="side-nav">
            <?php $selected = 0; foreach ($screenArray as &$screenName) { ?> 
            <li class="to-do to-do-wrap<?php echo $selected == 0 ? ' is-active' : '' ?>" ><span><?php echo $screenName['screenName']; $selected++; ?></span></li>
            <!--<li class="is-active"><span>Language Screen</span></li>
            <li><span>Condition Screen</span></li>
            <li><span>Name Screen</span></li>
            <li><span>Email Screen</span></li>
            <li><span>Age Screen</span></li>
            <li><span>Pack Screen</span></li>-->
            <?php } ?>
          </ul>
        </nav>
        <ul class="l-main-content main-content">

          <?php $selected = 0; foreach ($screenArray as &$screenName) { ?> 
          <li class="l-section section <?php echo $selected == 0 ? ' section--is-active' : '' ?>">
            <div class="intro" style="margin-top:230px;">
              <h2><?php echo $screenName['screenName']; $selected++; ?></h2>
              <div id="section1" class="container-fluid">
                <?php foreach ($screenName['languages'] as &$language) { ?> 
                <h4><?php echo $language; ?></h4>
                <hr class="style13">

                <div class="row">
                  <?php foreach ($value['imagesURL'][$language] as &$image) { ?>
                  <div class="block"><a target="_blank" href="<?php echo $image; ?>"><img class="thumbnail" src="<?php echo $image; ?>" alt="Paris"></a> <div>Samsung Galaxy</div></div>
                  <? } } ?>
                </div>




                <!--<h4>French</h4>
                <hr class="style13">

                <div class="row">
                  <div class="block"><a target="_blank" href="paris.jpg"><img class="thumbnail" src="https://www.w3schools.com/css/rock600x400.jpg" alt="Paris"></a> <div>Samsung Galaxy</div></div>
                  <div class="block"><a target="_blank" href="paris.jpg"><img class="thumbnail" src="https://www.w3schools.com/css/rock600x400.jpg" alt="Paris"></a> <div>Lenovo</div></div>
                  <div class="block"><a target="_blank" href="paris.jpg"><img class="thumbnail" src="https://www.w3schools.com/css/rock600x400.jpg" alt="Paris"></a> <div>Nexus 5x</div></div>
                  <div class="block"><a target="_blank" href="paris.jpg"><img class="thumbnail" src="https://www.w3schools.com/css/rock600x400.jpg" alt="Paris"></a> <div>Samsung</div></div>
                  <div class="block"><a target="_blank" href="paris.jpg"><img class="thumbnail" src="https://www.w3schools.com/css/rock600x400.jpg" alt="Paris"></a> <div>Samsung</div></div>
                  <div class="block"><a target="_blank" href="paris.jpg"><img class="thumbnail" src="https://www.w3schools.com/css/rock600x400.jpg" alt="Paris"></a> <div>Samsung</div></div>
                </div>

                <h4>Dutch</h4>
                <hr class="style13">

                <h4>German</h4>
                <hr class="style13">-->
              </div>
            </div>
          </li>
<?php } ?>

          <!--<li class="l-section section">
            <div class="work">
              <h2>Condition Screen</h2>
              <div class="work--lockup">
              </div>
            </div>
          </li>
          <li class="l-section section">
            <div class="about">
              <h2>Name Screen</h2>
            </div>
          </li>
          <li class="l-section section">
            <div class="contact">
              <h2>Email Screen</h2>
            </div>
          </li>
          <li class="l-section section">
            <div class="hire">
              <h2>Age Screen</h2>

            </div>
          </li>

          <li class="l-section section">
            <div class="work">
              <h2>Condition Screen</h2>
              <div class="work--lockup">
              </div>
            </div>
          </li>-->
        </ul>
      </div>
    </div>
  </div>
  <ul class="outer-nav">
    <li class="is-active">Language Screen</li>
    <li>Condition Screen</li>
    <li>Name Screen</li>
    <li>Email Screen</li>
    <li>Pack Screen</li>
    <li>Pack Screen</li>
  </ul>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-2.2.4.min.js"><\/script>')</script>
<script src="assets/js/functions-min.js"></script>
</body>
</html>
