<?php
require_once('config.php');
$user=getUsername();
$response = mysqli_query($connection,"SELECT `j_p` FROM `users` WHERE `email`='$user'") or die(mysqli_error($connection));
      $jp = mysqli_fetch_assoc($response);
if( strcmp($jp['j_p'],'P')){
    $sidebar = [
        [
            'title' => 'Add Contests',
            'link' => 'addContests.php',
        ],
        [
            'title' => 'Add Judges',
            'link' => 'addJudges.php',
        ],
        [
            'title' => 'Contests',
            'link' => 'contests.php',
        ],
        [
            'title' => 'Delete Participant',
            'link' => 'delPar.php',
        ], [
            'title' => 'Profile',
            'link' => 'profile.php',
        ],
        [
            'title' => 'Results',
            'link' => 'allContests.php',
        ],
        [
            'title' => 'Add Sponser',
            'link' => 'addSponser.php',
        ],
        [
            'title' => 'Sponser Details',
            'link' => 'sponser.php',
        ],
        
    ];
 }
      else{
        $sidebar = [
            [
                'title' => 'Contests',
                'link' => 'contests.php',
            ],
            [
                'title' => 'Achievments',
                'link' => 'parResult.php',
            ],
            [
                'title' => 'Profile',
                'link' => 'profile.php',
            ],
            [
                'title' => 'Results',
                'link' => 'allContests.php',
            ],
  
        ];
      }
?>
<div class="sidebar-sticky mt-3">
    <ul class="nav flex-column" >
        <?php
foreach ($sidebar as $item) {
    ?>
        <li class="nav-item">
            <a class="nav-link" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 17px;' href="<?php echo $item['link'] ?>">
                <?php echo $item['title']; ?>
            </a>
        </li>
        <?php
}
?>
    </ul>
</div>