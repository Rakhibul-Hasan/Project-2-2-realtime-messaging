<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: sans-serif;
}
body{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: #f7f7f7;
}
.wrapper{
    background: #fff;
    width: 450px;
    border-radius: 16px;
    box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),0 32px 64px -48px rgba(0,0,0,0.5);
}
.form{
    padding: 25px 30px;
}
.form header{
    font-size: 25px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 1px solid #e6e6e6;
}
.form form{
    margin: 20px 0;
}
.form form .error-txt{
    color: #721c24;
    background: #f8d7da;
    padding: 8px 10px;
    text-align: center;
    border-radius: 5px;
    margin-bottom: 10px;
    border: 1px solid #f5c6cb;
     display: none ;
}
.form form .name-details{
    display: flex;
}
form .name-details .field:first-child{
    margin-right: 10px;
}
form .name-details .field:last-child{
    margin-left: 10px;
}
.form form .field{
    display: flex;
    position: relative;
    flex-direction: column;
    margin-bottom: 10px; 
}
.form form .field label{
    margin-bottom: 2px;
}
.form form .field input{
    outline: none;
}
.form form .input input{
    height: 40px;
    width: 100%;
    font-size: 16px;
    padding: 0 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.form form .image input{
    font-size: 17px;
}
.form form .button input{
    margin-top: 13px;
    height: 45px;
    border: none;
    font-size: 17px;
    font-weight: 400;
    background: rgb(36, 47, 100);
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}
.form form .button input:hover{
    background: rgba(36, 47, 100,0.95);
    color: rgb(57, 30, 65);
}
.form form .field i{
    position: absolute;
    right: 15px;
    color: rgb(95, 94, 94);
    top: 70%;
    transform: translateY(-50%);
    cursor: pointer;
}
.form form .field i.active::before{
    color: #333;
    content: "\f070";
}
.form .link{
    text-align: center;
    margin: 10px 0;
    font-size: 17px;
}
.form .link a{
    color: rgb(58, 40, 158);
}
.form .link a:hover{
    text-decoration: underline;
}


/* user side design  */
.users{
    padding: 25px 30px;
}
.users header,
.users-list a{
    display: flex;
    align-items: center;
    padding-bottom: 20px;
    justify-content: space-between;
    border-bottom: 1px solid #e6e6e6;
}
.wrapper img{
    object-fit: cover;
    border-radius: 50%;
}
:is(.users, .users-list) .content{
    display: flex;
    align-items: center;
}
.users header .content img{
    height: 50px;
    width: 50px;
}
:is(.users, .users-list) .details{
    margin-left: 15px;
    color: #000;
}
:is(.users, .users-list) .details span{
    font-size: 18px;
    font-weight: 500;
}
.users header .logout{
    background: #333;
    color: #fff;
    font-size: 17px;
    padding: 7px 15px;
    border-radius: 5px;
}
.users .search{
    margin: 20px 0;
    display: flex;
    align-items: center;
    position: relative;
    justify-content: space-between;
  
}
.users .search .text{
    font-size: 18px;
}
.users .search input{
    position: absolute;
    height: 42px;
    width: calc(100% - 40px);
    border: 1px solid #ccc;
    padding: 0 13px;
    font-size: 16px;
    border-radius: 5px 0 0 5px;
    outline: none;
    opacity: 0;
    pointer-events: none;
    transition: all 0.1s ease;
}
.users .search input.active{
    opacity: 1;
    pointer-events: auto;
}
.users .search button{
    width: 47px;
    height: 42px;
    border: none;
    outline: none;
    color: #333;
    background: #fff;
    cursor: pointer;
    font-size: 17px;
    border-radius: 0 5px 5px 0;
    transition: all 0.1s ease;
}
.users .search button.active{
    color: #fff;
    background: #333;
}
.users .search button.active i::before{
    content: "\f00d";
}
.users-list{
 max-height: 350px;
 overflow-y: auto;
}
:is(.users-list, .chat-box)::-webkit-scrollbar{
    width: 0;
}
.users-list a{
    padding-right: 15px;
    page-break-after: 10px;
    margin-bottom: 15px;
    border-block-color: #f1f1f1;
}
.users-list a:last-child{
    border: none;
    margin-bottom: 0px;
}
.users-list a .content img{
    height: 40px;
    width: 40px;
}
.users-list a .content p{
    color: #67676a;
}
.users-list a .status-dot{
    font-size: 12px;
    color: #468669;
}
.users-list a .status-dot.offline{
    color: #ccc;
}

/* chat are css code  */
.chat-area header{
    display: flex;
    align-items: center;
    padding: 18px 30px;
}
.chat-area header .back-icon{
    font-size: 18px;
    color: #333;
}
.chat-area header img{
    height: 45px;
    width: 45px;
    margin: 0 15px;
}
.chat-area header span{
    font-size: 17px;
    font-weight: 500;
}
.chat-box{
    height: 500px;
    overflow-y: auto;
    background: #f7f7f7;
    padding: 10px 30px 20px 30px;
    box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
}
.chat-box .chat{
    margin: 15px 0;
}
.chat-box .chat p{
    word-wrap: break-word;
    padding: 8px 16px;
    box-shadow: 0 0 32px rgb(0 0 0 / 8%),
                0 16px 16px -16px rgb(0 0 0 / 10%);
}
.chat-box .outgoing{
    display: flex;
}
.outgoing .details{
    margin-left: auto;
    max-width: calc(100% - 130px);
}
.outgoing .details p{
    background: #333;
    color: #fff;
    border-radius: 18px 18px 0 18px;
}
.chat-box .incoming{
    display: flex;
    align-items: flex-end;
}
.chat-box .incoming img{
    height: 35px;
    width: 35px;
}
.incoming .details{
    margin-left: 10px;
    margin-right: auto;
    max-width: calc(100% - 130px);
}
.incoming .details p{
    color: #333;
    background: #fff;
    border-radius: 18px 18px 18px 0;
}
.chat-area .typing-area{
    padding: 18px 30px;
    display: flex;
    justify-content: space-between;
}
.typing-area input{
    height: 45px;
    width: calc(100% - 58px);
    font-size: 17px;
    border: 1px solid #ccc;
    padding: 0 13px;
    border-radius: 5px 0 0 5px;
    outline: none;
}
.typing-area button{
    width: 55px;
    border: none;
    outline: none;
    background: #333;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    border-radius: 0 5px 5px 0;
}
</style>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>HeyBuddy</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First Name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last Name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Sign Up">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
