
<?php 
require_once './function.php';   // entrer dans le fichier function.php
if ( user_connected() ) {     // vérifier si l'utilisateur est connecté
    $host = 'localhost';
    $db_name = 'projets';
    $username = 'root';
    $password = '';

    $bdd = null;

    try {
        $bdd = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "connexion reussie ! <br> \n";
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}
// connexion à la BD
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="useful/bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">

  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar h2 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .sidebar .active{
            color:aqua;
        }



        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap");
    *, *:after, *:before {
      box-sizing: border-box;
    }

    :root {
      --c-theme-primary: #008FFD;
      --c-theme-primary-accent: #CBE8FF;
      --c-bg-primary: #D6DAE0;
      --c-bg-secondary: #EAEBEC;
      --c-bg-tertiary: #FDFDFD;
      --c-text-primary: #1F1F25;
      --c-text-secondary: #999FA6;
    }

    body {
      font-family: "Inter", sans-serif;
      line-height: 1.5;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: var(--c-bg-primary);
      color: var(--c-text-primary);
    }

    button {
      font: inherit;
      cursor: pointer;
    }
    button:focus {
      outline: 0;
    }

    .datepicker {
      width: 95%;
      max-width: 350px;
      background-color: var(--c-bg-tertiary);
      border-radius: 10px;
      box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.2), 0 5px 10px 0 rgba(0, 0, 0, 0.1);
      padding: 1rem;
    }

    .datepicker-top {
      margin-bottom: 1rem;
    }

    .btn-group {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 1rem;
      margin-top: -0.5rem;
    }

    .tag {
      margin-right: 0.5rem;
      margin-top: 0.5rem;
      border: 0;
      background-color: var(--c-bg-secondary);
      border-radius: 10px;
      padding: 0.5em 0.75em;
      font-weight: 600;
    }

    .month-selector {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .arrow {
      display: flex;
      align-items: center;
      justify-content: center;
      border: 0;
      background-color: #FFF;
      border-radius: 12px;
      width: 2.5rem;
      height: 2.5rem;
      box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.25), 0 0 10px 0 rgba(0, 0, 0, 0.15);
    }

    .month-name {
      font-weight: 600;
    }

    .datepicker-calendar {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      grid-row-gap: 1rem;
    }

    .day, .date {
      justify-self: center;
    }

    .day {
      color: var(--c-text-secondary);
      font-size: 0.875em;
      font-weight: 500;
      justify-self: center;
    }

    .date {
      border: 0;
      padding: 0;
      width: 2.25rem;
      height: 2.25rem;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 6px;
      font-weight: 600;
      border: 2px solid transparent;
      background-color: transparent;
      cursor: pointer;
    }
    .date:focus {
      outline: 0;
      color: var(--c-theme-primary);
      border: 2px solid var(--c-theme-primary-accent);
    }

    .faded {
      color: var(--c-text-secondary);
    }

    .current-day {
      color: #FFF;
      border-color: var(--c-theme-primary);
      background-color: var(--c-theme-primary);
    }
    .current-day:focus {
      background-color: var(--c-theme-primary-accent);
    }
</style>


</head>






<body>
<?php 
            include "navbar.php";
        ?>

    <div class="sidebar" style="margin-top:80px;">
        <h2><i class="fas fa-chart-line"></i> Tableau de bord</h2>
        <a href="dashboardhome.php"><i class="fas fa-home"></i> Accueil</a>
        <a href="dashboardproject.php"><i class="fas fa-project-diagram"></i> Projets</a>
        <a href="dashboardtask.php"><i class="fas fa-tasks"></i> Tâches</a>
        <a href="dashboardcalendar.php" class="active"><i class="fas fa-calendar-alt"></i> Calendrier</a>
        <p><br><br>
            <?php   if(est_connecte()){
                     include_once './deconnexion.php';
            } 
        ?></p>
    </div>
    <div class="content">
        <h2>Calendrier</h2>
        <p>Bienvenue sur votre Calendrier de taches.</p>


        <div class="datepicker">
	<div class="datepicker-top">
		<div class="btn-group">
			<button class="tag">Today</button>
			<button class="tag">Tomorrow</button>
			<button class="tag">In 2 days</button>
		</div>
		<div class="month-selector">
			<button class="arrow"><i class="material-icons"> < </i></button>
			<span class="month-name">Octobre 2024</span>
			<button class="arrow"><i class="material-icons"></i> > </button>
		</div>
	</div>
	<div class="datepicker-calendar">
		<span class="day">Mo</span>
		<span class="day">Tu</span>
		<span class="day">We</span>
		<span class="day">Th</span>
		<span class="day">Fr</span>
		<span class="day">Sa</span>
		<span class="day">Su</span>
		<button class="date faded">30</button>
		<button class="date">1</button>
		<button class="date">2</button>
		<button class="date">3</button>
		<button class="date">4</button>
		<button class="date">5</button>
		<button class="date">6</button>
		<button class="date">7</button>
		<button class="date">8</button>
		<button class="date">9</button>
		<button class="date">10</button>
		<button class="date">11</button>
		<button class="date">12</button>
		<button class="date">13</button>
		<button class="date">14</button>
		<button class="date">15</button>
		<button class="date">16</button>
		<button class="date">17</button>
		<button class="date">18</button>
		<button class="date">19</button>
		<button class="date">20</button>
		<button class="date">21</button>
		<button class="date">22</button>
		<button class="date">23</button>
		<button class="date">24</button>
		<button class="date">25</button>
		<button class="date">26</button>
		<button class="date">27</button>
		<button class="date">28</button>
		<button class="date current-day">29</button>
		<button class="date">30</button>
		<button class="date">31</button>
		<button class="date faded">1</button>
		<button class="date faded">2</button>
		<button class="date faded">3</button>
	</div>
</div>
    </div>
</body>
</html> 



