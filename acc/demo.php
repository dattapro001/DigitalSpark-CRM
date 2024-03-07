Sidebar Links
<ul class="nav nav-pills flex-column mt-1" style="border-radius: 10px; height: 130px; width: 230px; margin-left: -20px;" role="tablist">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");

    while ($row = mysqli_fetch_assoc($query)) {
        echo '
        <header class="justify-content-center align-items-center mt-2">
            <a class="nav-link d-flex text-light project-link" style="margin-top: -15px;" data-bs-toggle="pill" href="#project-' . $row['project_id'] . '"><b>' . $row['name'] . '</b></a>
        </header>
        <p class="mx-2" style="margin-top: -5px;">' . $row['name'] . '</p>
        <div class="images d-flex">
            <img src="uploaded_img/' . $dev1['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 10px;">
            <img src="uploaded_img/' . $dev2['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 30px;">
            <img src="uploaded_img/' . $dev3['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 30px;">
        </div>';
    }
    ?>
</ul>

<!-- Tab Panes -->
<div class="tab-content">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");

    while ($row = mysqli_fetch_assoc($query)) {
        echo '
        <div id="project-' . $row['project_id'] . '" class="container tab-pane">
            <div class="d-flex" style="margin-left: 0px;">
                <!-- Content for each project will be dynamically loaded here using AJAX -->
            </div>
        </div>';
    }
    ?>
</div>

<!-- JavaScript for AJAX -->
<script>
    $(document).ready(function () {
        // Handle project link clicks
        $('.project-link').on('click', function (e) {
            e.preventDefault();

            // Get the target project ID from the link
            var projectId = $(this).attr('href').replace('#project-', '');

            // Use AJAX to load the content for the selected project
            $.ajax({
                type: 'POST',
                url: 'load_project_content.php', // Create a PHP file to handle content loading
                data: { project_id: projectId },
                success: function (data) {
                    // Update the content of the tab pane
                    $('#project-' + projectId).html(data);
                },
                error: function () {
                    console.error('Failed to load project content.');
                }
            });
        });
    });
</script>


<!-- Tab panes -->
<div class="col-md-8">
    <div class="tab">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");

            while ($row = mysqli_fetch_assoc($query)) {
                echo '
                <li class="nav-item">
                    <a class="nav-link" id="project-tab' . $row['unique_id'] . '" data-bs-toggle="pill" href="#project' . $row['unique_id'] . '">' . $row['name'] . '</a>
                </li>';
            }
            ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");

            while ($row = mysqli_fetch_assoc($query)) {
                echo '
                <div id="project' . $row['unique_id'] . '" class="container tab-pane">
                    <div class="d-flex" style="margin-left: 0px;">
                        <!-- Content for each project will be dynamically loaded here using AJAX -->
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>












<!-- Tab panes -->
<div class="col-md-8">
    <div class="tab-content">
        <!-- Dashboard Tab -->
        <?php
        $query = mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");

        while ($row = mysqli_fetch_assoc($query)) {
            echo '
            <div id="project' . $row['unique_id']. '" class="container tab-pane">
                <div class="d-flex" style="margin-left: 0px;">
                    <!-- Content for each project will be dynamically loaded here using AJAX -->
                </div>
            </div>';
        }
        ?>
    </div>
    <!-- col-md-8 -->
</div>

<?php
$user_id = $_SESSION['unique_id'];
$query = mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");

while ($row = mysqli_fetch_assoc($query)) {
    $dev1_id = $row['developer_1_id'];
    $dev2_id = $row['developer_2_id'];
    $dev3_id = $row['developer_3_id'];

    $sql2 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev1_id'");
    $dev1 = mysqli_fetch_assoc($sql2);
    $sql3 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev2_id'");
    $dev2 = mysqli_fetch_assoc($sql3);
    $sql4 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev3_id'");
    $dev3 = mysqli_fetch_assoc($sql4);

    echo '
    <!-- 2nd side bar start -->
    <div class="col-md-2 mt-3" id="sidebar" style="display: flex; position: relative; padding-bottom: 60px;">
        <div class="row">
            <div class="" style="margin-left: -25px;">
                <ul class="nav nav-pills flex-column mt-1" style="border-radius: 10px; height: 130px; width: 230px; margin-left: -20px;" role="tablist">
                    <header class="justify-content-center align-items-center mt-2">
                        <a class="nav-link project-link" id="project-tab' . $row['unique_id'] . '" href="#project' . $row['unique_id'] . '">' . $row['name'] . '</a>
                    </header>
                    <p class="mx-2" style="margin-top: -5px;">' . $row['name'] . '</p>
                    <div class="images d-flex">
                        <img src="uploaded_img/' . $dev1['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 10px;">
                        <img src="uploaded_img/' . $dev2['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 30px;">
                        <img src="uploaded_img/' . $dev3['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 30px;">
                    </div>
                </ul>
            </div>
        </div>
    </div>';
}
?>


<!-- Tab panes -->
<div class="col-md-8">
    <div class="tab-content">
        <!-- Dashboard Tab -->
        <?php
        $query = mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");

        while ($row = mysqli_fetch_assoc($query)) {
            echo '
            <div id="project' . $row['unique_id']. '" class="container tab-pane">
                <div class="d-flex" style="margin-left: 0px;">
                    <!-- Content for each project will be dynamically loaded here using AJAX -->
                </div>
            </div>';
        }
        ?>
    </div>
    <!-- col-md-8 -->
</div>

<?php
$user_id = $_SESSION['unique_id'];
$query = mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");

while ($row = mysqli_fetch_assoc($query)) {
    $dev1_id = $row['developer_1_id'];
    $dev2_id = $row['developer_2_id'];
    $dev3_id = $row['developer_3_id'];

    $sql2 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev1_id'");
    $dev1 = mysqli_fetch_assoc($sql2);
    $sql3 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev2_id'");
    $dev2 = mysqli_fetch_assoc($sql3);
    $sql4 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev3_id'");
    $dev3 = mysqli_fetch_assoc($sql4);

    echo '
    <!-- 2nd side bar start -->
    <div class="col-md-2 mt-3" id="sidebar" style="display: flex; position: relative; padding-bottom: 60px;">
        <div class="row">
            <div class="" style="margin-left: -25px;">
                <ul class="nav nav-pills flex-column mt-1" style="border-radius: 10px; height: 130px; width: 230px; margin-left: -20px;" role="tablist">
                    <header class="justify-content-center align-items-center mt-2">
                        <a class="nav-link project-link" id="project-tab' . $row['unique_id'] . '" href="#project' . $row['unique_id'] . '">' . $row['name'] . '</a>
                    </header>
                    <p class="mx-2" style="margin-top: -5px;">' . $row['name'] . '</p>
                    <div class="images d-flex">
                        <img src="uploaded_img/' . $dev1['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 10px;">
                        <img src="uploaded_img/' . $dev2['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 30px;">
                        <img src="uploaded_img/' . $dev3['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 30px;">
                    </div>
                </ul>
            </div>
        </div>
    </div>';
}
?>

<!-- row -->
</div>
<!--COntainer  -->
</div>

<!-- Initialize Tabs Using JavaScript -->
<script>
$(document).ready(function () {
    // Show the first tab content by default
    $('.tab-pane:first').addClass('show active');

    $('.project-link').click(function (e) {
        // Prevent the default action of the link
        e.preventDefault();

        // Remove active class from all project links
        $('.project-link').removeClass('active');

        // Add active class to the clicked project link
        $(this).addClass('active');

        // Show the corresponding tab content
        var tabId = $(this).attr('href');
        $('.tab-pane').removeClass('show active');
        $(tabId).addClass('show active');
    });
});
</script>


<!-- Tab panes -->
<div class="col-md-8">
    <div class="tab-content">
        <!-- Dashboard Tab -->
        <?php
        $query = mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");

        while ($row = mysqli_fetch_assoc($query)) {
            echo '
            <div id="project' . $row['unique_id']. '" class="container tab-pane">
                <div class="d-flex" style="margin-left: 0px;">
                    <!-- Content for each project will be dynamically loaded here using AJAX -->
                </div>
            </div>';
        }
        ?>
    </div>
    <!-- col-md-8 -->
</div>

<?php
$user_id = $_SESSION['unique_id'];
$query = mysqli_query($conn, "SELECT * FROM project WHERE manager_id = '{$user_id}'");

$firstProject = true;

while ($row = mysqli_fetch_assoc($query)) {
    $dev1_id = $row['developer_1_id'];
    $dev2_id = $row['developer_2_id'];
    $dev3_id = $row['developer_3_id'];

    $sql2 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev1_id'");
    $dev1 = mysqli_fetch_assoc($sql2);
    $sql3 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev2_id'");
    $dev2 = mysqli_fetch_assoc($sql3);
    $sql4 = mysqli_query($conn, "SELECT * FROM developer WHERE unique_id = '$dev3_id'");
    $dev3 = mysqli_fetch_assoc($sql4);

    echo '
    <!-- 2nd side bar start -->
    <div class="col-md-2 mt-3" id="sidebar" style="display: flex; position: relative; padding-bottom: 60px;">
        <div class="row">
            <div class="" style="margin-left: -25px;">
                <ul class="nav nav-pills flex-column mt-1" style="border-radius: 10px; height: 130px; width: 230px; margin-left: -20px;" role="tablist">
                    <header class="justify-content-center align-items-center mt-2">
                        <a class="nav-link project-link ' . ($firstProject ? 'active' : '') . '" id="project-tab' . $row['unique_id'] . '" href="#project' . $row['unique_id'] . '">' . $row['name'] . '</a>
                    </header>
                    <p class="mx-2" style="margin-top: -5px;">' . $row['name'] . '</p>
                    <div class="images d-flex">
                        <img src="uploaded_img/' . $dev1['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 10px;">
                        <img src="uploaded_img/' . $dev2['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 30px;">
                        <img src="uploaded_img/' . $dev3['d_profile'] . '" class="" style="object-fit: cover; border-radius: 50%; height: 45px; width: 45px; margin-left: 30px;">
                    </div>
                </ul>
            </div>
        </div>
    </div>';
    $firstProject = false;


}
?>

<!-- row -->
</div>
<!--COntainer  -->
</div>

<!-- Initialize Tabs Using JavaScript -->
<script>
$(document).ready(function () {
    // Show the first tab content and add active class to the first nav link by default
    $('.tab-pane:first').addClass('show active');
    $('.project-link:first').addClass('active');

    $('.project-link').click(function (e) {
        // Prevent the default action of the link
        e.preventDefault();

        // Remove active class from all project links
        $('.project-link').removeClass('active');

        // Add active class to the clicked project link
        $(this).addClass('active');

        // Show the corresponding tab content
        var tabId = $(this).attr('href');
        $('.tab-pane').removeClass('show active');
        $(tabId).addClass('show active');
    });
});









document.addEventListener('DOMContentLoaded', function () {
    // Click event for navigation items
    var navLinks = document.querySelectorAll('a.nav-link');

    navLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            var projectId = this.id.replace('project-tab', '');

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Configure it to make a POST request to 'manager-details.php'
            xhr.open('POST', 'manager-details.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Define the callback function to handle the response
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Update the content dynamically
                        var container = document.getElementById('project' + projectId);
                        if (container) {
                            container.getElementsByClassName('d-flex')[0].innerHTML = xhr.responseText;
                        }
                    } else {
                        console.error('Error:', xhr.status, xhr.statusText);
                    }
                }
            };

            // Send the AJAX request with the project ID
            xhr.send('project_id=' + projectId);
        });
    });

    // Function to load content on page load
    function loadInitialContent() {
        var firstLink = document.querySelector('a.nav-link:first-child');
        if (firstLink) {
            var projectId = firstLink.id.replace('project-tab', '');
            sendAjaxRequest(projectId);
        }
    }

    // Function to send an AJAX request
    function sendAjaxRequest(projectId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'manager-details.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var container = document.getElementById('project' + projectId);
                    if (container) {
                        container.getElementsByClassName('d-flex')[0].innerHTML = xhr.responseText;
                    }
                } else {
                    console.error('Error:', xhr.status, xhr.statusText);
                }
            }
        };

        xhr.send('project_id=' + projectId);
    }

    // Call the function to load content on page load
    loadInitialContent();
});

</script>


