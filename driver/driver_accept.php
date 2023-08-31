    <section class="accept">
            <div class="row">
                <div class="col" style="margin-left:30px;">
                    <h2>Customer details</h2>
                    <p>Name: <strong>Anas</strong></p>
                    <p>Phone: <strong>01734354244</strong></p>
                    <p>Email: <strong>anas2000@gmail.com</strong></p>
                    <div class="p_location">
                        <p>pickup: Ring Road, Dhaka, Bangladesh </p>
                        <p>destination: Khaled Mosharaf Avenue, ঢাকা, বাংলাদেশ</p>
                    </div>
                    <p>Amount:41 BDT</p>
                    <div id="action_btns">
                        <button class="endBtn" id="strtBtn" onclick="startTrip()">start Trip</button>
                    </div>

                </div>
                <div class="col-7">
                    <h3>Location</h3>
                    <img src="../assets/images/transport.png" style="width:720px;height: 560px;" alt="">
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
            setTimeout(() => {
                actionBtns.innerHTML = `
                    <button class="endBtn" id="endBtn" onclick="endTrip()">End Trip</button>
                `;
            }, 7000);
        }
    </script>