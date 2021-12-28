<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
</head>

<style>
  body {
    background-image:url("https://images.unsplash.com/photo-1528731708534-816fe59f90cb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1470&q=80");
    background-size:cover;
  }
  </style>
<body>
    <form action="psignup.php" method="POST" id="signup-form">
        <div class="w-50 ml-auto mr-auto mt-5">
        <div class="mb-3 ">
                <label for="name" class="form-label">이름</label>
                <input type="name" name="name" class="form-control" id="name" placeholder="이름를 입력해 주세요." style="width:300px;" maxlength="10">
        </div>
        <div class="mb-3 "><label for="phone" class="form-label">휴대폰 번호</label>
            <input type="phone" name="phone" class="form-control" id="phone" placeholder="- 없이 번호만 입력해 주세요." style="width:300px;" maxlength="11">
        </div>
        <div class="mb-3 ">
                <label for="id" class="form-label">아이디</label>
                <input type="id" name="id" class="form-control" id="id" placeholder="아이디를 입력해 주세요." style="width:300px;" maxlength="20">
            </div>
            <div class="mb-3 ">
                <label for="password" class="form-label">비밀번호</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="비밀번호를 입력해 주세요." style="width:300px;" maxlength="15">
            </div>
            <div class="mb-3 ">
                <label for="passwordCheck" class="form-label">비밀번호 체크</label>
                <input type="password" class="form-control" id="password-check" placeholder="비밀번호를 한번더 입력해 주세요." style="width:300px;" maxlength="15">
            </div>
            <button type="button" id="signup-button" class="btn btn-primary mb-3">회원가입</button> 
            <a class="btn btn-primary mb-3" aria-current="page" href="index.php">돌아가기</a></div></form>
    <script>
        const signupForm = document.querySelector("#signup-form");
        const signupButton = document.querySelector("#signup-button");
        const password = document.querySelector("#password");
        const passwordCheck = document.querySelector("#password-check");
        signupButton.addEventListener("click", function(e) {
            if(password.value&& password.value === passwordCheck.value){
            signupForm.submit();
            }else{
                alert("비밀번호가 서로 일치하지 않습니다");         }});
    </script>
</body>
</html>