<?php
include 'connection.php';
$results = mysqli_query($conn, "SELECT planners_name,planners_designation,planners_location,p_id FROM `planner_list` ");
//$searchTerm = $_POST['search-bar'];
//$results = mysqli_query($conn,"SELECT planners_name, planners_designation, planners_location FROM `planner_list` WHERE `planners_name` LIKE '%{$searchTerm}%' OR `planners_designation` LIKE '%{$searchTerm}%' OR `planners_location` LIKE '%{$searchTerm}%'") ;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Event Planner</title>
    <style>
        /* body{
            background-image: url('Images/search.jpg');
            background-repeat: no-repeat;
        } */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
            background-image: linear-gradient(#E65758, #771D32);
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .search-bar {
            margin-bottom: 50px;
            width: 50%;
            height: 55px;
            border-radius: 40px;
            margin-left: 420px;
            border: 1px solid gray;
        }

        ::placeholder {
            text-align: center;
            color: black;
            font-style: italic;
            font-size: 20px;
            font-weight: bolder;
        }
    </style>
    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search-bar");
            filter = input.value.toUpperCase();
            table = document.getElementById("planner-table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those that don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (!td) {
                    td = tr[i].getElementsByTagName("td")[0];
                }
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

            // Show the table if there is any search query
            if (filter !== "") {
                table.style.display = "";
            } else {
                table.style.display = "none";
            }
        }
    </script>
</head>

<body>
    <h1 style="font-size: 60px;font-weight:bold;text-align:center">Find the best people for your job</h1>
    <input class="search-bar" type="text" name="search-bar" id="search-bar" onkeyup="searchTable()" placeholder="Search event planner by their designation . . .">
    <button type="submit" name="search" id="searchBtn" style="display: none;">Search</button>
    <table id="planner-table" style="display:none">
        <thead>
            <tr>
                <th>Name</th>
                <th>Designation</th>
                <th>Location</th>
                <th>Profile</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($results)) {
                echo "<tr>";
                echo "<td>" . $row['planners_name'] . "</td>";
                echo "<td>" . $row['planners_designation'] . "</td>";
                echo "<td>" . $row['planners_location'] . "</td>";
                //echo "<td><a href='#'>Visit</a></td>";
                echo "<td><a href='p_profile.php?p_id=" . $row['p_id'] . "' style='text-decoration:none;'>View Profile</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>