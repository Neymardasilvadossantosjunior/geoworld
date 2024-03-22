<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php  require_once 'header.php'; ?>
<?php
require_once 'inc/manager-db.php';
if (isset($_GET['continent'])){
  $continent = $_GET['continent'];} else {
    $continent = 'Asia';
  }
$desPays = getCountriesByContinent($continent);

?>

<main role="main" class="flex-shrink-0">

  <div class="container">
    <h1>Les pays en <?php echo $continent;?> : <?php echo getNbTotalpaysparcontinent()?></h1>
    <div>
     <table class="table">
         <tr>
           <th>Id</th>
           <th>Nom</th>
           <th>Region</th>
           <th>Population</th>
           <th>Capital</th>
           <th>President</th>
           <th>Government</th>
           <th>Drapeau</th>
          </tr>
          <?php foreach ($desPays as $paysContinent): ?>         
            <tr>
              <td> <?php echo $paysContinent->id ?></td>
              <td><a href="country_info.php?country=<?php echo urlencode($paysContinent->Name); ?>"><?php echo $paysContinent->Name; ?></a></td>
              <td> <?php echo $paysContinent->Region ?></td>
              <td> <?php echo $paysContinent->Population ?></td>
              <td> <?php if(!empty($paysContinent->Capital)){echo getCapitale($paysContinent->Capital);} else{echo "pas de capitale";}?></td>
              <td> <?php if (!empty($paysContinent->HeadOfState)){echo $paysContinent->HeadOfState;} else{echo "pas de president";}?></td>
              <td> <?php echo $paysContinent->GovernmentForm ?></td>
              <td> <img src= "./images/drapeau/<?php if (!empty ($paysContinent->Code2)){echo strtolower($paysContinent->Code2);} else{echo "pas de drapeau";}?>.png">
            </tr>
            <?php endforeach; ?>


     </table>
    </div>
        <p>nombre de pays total : <?php echo getNbTotalpays(); ?></p>

  </div>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
