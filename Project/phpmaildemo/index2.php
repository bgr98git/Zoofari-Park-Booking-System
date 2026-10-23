<style>
  .custom-alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #d4edda; /* Light green background */
            color: #155724; /* Deep green text */
            padding: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1001;
			
            display: none; /* Initially hidden */
        }

        .custom-alert button {
            background-color: #155724; /* Deep green button background */
            color: #fff; /* White text */
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
			width:auto;
        }

        .custom-alert button:hover {
            background-color: #0c3e16; /* Darker green on hover */
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff; /* Solid white background */
            z-index: 1000;
            display: none; /* Initially hidden */
        }

</style>



<?php
//echo " Mail is delivered";

 echo '
    <div class="overlay"></div>
    <div class="custom-alert">
        <p>Mail is delivered</p>
        <button onclick="redirect()">OK</button>
    </div>
    <script>
        function showAlert() {
            document.querySelector(".overlay").style.display = "block";
            document.querySelector(".custom-alert").style.display = "block";
        }

        function redirect() {
            window.location.href = "../index.php";
        }

        showAlert();
    </script>
    ';
?>