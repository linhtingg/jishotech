<!-- header -->
<header class="header container-fluid">
  <div class="header-left">
    <div class="logo text-center">
    <a href="#" class="logo__link">JishoTech</a>
    </div>

    <div class="header-navbar">
          <ul class="nav nav-pills navbar-custom">
            <li class="nav-item active">
              <a href="#" class="nav-link text-center">単語の探索</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-center">ピックリスト</a>
            </li>
            <li  class="nav-item">
              <a href="#" class="nav-link text-center">ブックマーク</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link text-center">アクション歴史</a>
            </li>
          </ul>
    </div>
  </div>
      
  <div class="header-right">
    <div class="dropdown">
      <button class="btn-dd dropdown-toggle" type="button" data-bs-toggle="dropdown">
        ユーザー名
      </button>
      <ul class="dropdown-menu">
        <li>
          <a class="dropdown-item" href="#">
            <img src="./images/header/avatar-icon.png" alt="avatar-icon">
            プロフィール
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="#">
            <img src="./images/header/signout-icon.png" alt="signout-icon">
            サインアウト
          </a>
        </li>
      </ul>
    </div>
  </div>
</header>

<script>
  $(document).ready(function(){
    $('.nav-item').click(function(){
      $('.nav-item').removeClass('active');
      $(this).addClass('active');
    });
  });
</script>
