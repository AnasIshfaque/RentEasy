    <?php
        include '../config/db_conn.php';

        $id = $_GET['id'];

        $sql = "SELECT * FROM renting WHERE customerId=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    <section class="accept">
            <div class="row">
                <div class="col" style="margin-left:30px;">
                    <h2>Customer details</h2>
                    <p>Name: <strong><?php echo $row['name'] ?></strong></p>
                    <p>Phone: <strong><?php echo $row['mobile'] ?></strong></p>
                    <p>Email: <strong><?php echo $row['email'] ?></strong></p>
                    <div class="p_location">
                        <p>pickup: <?php echo $row['pickup_loc'] ?> </p>
                        <p>destination: <?php echo $row['dest_loc'] ?></p>
                    </div>
                    <p>Amount:<?php echo $row['amount'] ?>BDT</p>
                    <div id="action_btns">
                        <button class="endBtn" id="strtBtn" onclick="startTrip()">start Trip</button>
                    </div>

                </div>
                <div class="col-7">
                    <h3>Location</h3>
                    <div class="drv_mapContainer"></div>
                </div>
            </div>
    </section>

    <script>

        function startTrip() {
            let startBtn = document.getElementById('strtBtn');
            startBtn.style.display = 'none';
            let actionBtns = document.getElementById('action_btns');
            actionBtns.innerHTML = `
               <p>Ride is ongoing!</p>
            `;
        }
    </script>