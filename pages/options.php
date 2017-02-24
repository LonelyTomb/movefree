<a href="#" class="dropdown-button right" data-activates="dropOptions"><i class="material-icons">more_vert</i></a>
        <ul id="dropOptions" class="dropdown-content">
            <li class="divider"></li>
            <li><a href="index.php">home</a></li>
            <?php
            if ($_SESSION['user']['type'] == 'Passenger') {
                        echo '<li><a href="?home">menu</a></li>';
            }
                    ?>
            <li><a href="#">about</a></li>
            <li><a href="index.php?logout">log out</a></li>
        </ul>