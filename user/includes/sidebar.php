<div class="topiclist">
    <div class="title">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" viewBox="0 0 32 29" fill="none">
        <path d="M1.74411 16.0556H12.2088C13.168 16.0556 13.9529 15.3556 13.9529 14.5V2.05556C13.9529 1.2 13.168 0.5 12.2088 0.5H1.74411C0.784848 0.5 0 1.2 0 2.05556V14.5C0 15.3556 0.784848 16.0556 1.74411 16.0556ZM1.74411 28.5H12.2088C13.168 28.5 13.9529 27.8 13.9529 26.9444V20.7222C13.9529 19.8667 13.168 19.1667 12.2088 19.1667H1.74411C0.784848 19.1667 0 19.8667 0 20.7222V26.9444C0 27.8 0.784848 28.5 1.74411 28.5ZM19.1852 28.5H29.6498C30.6091 28.5 31.3939 27.8 31.3939 26.9444V14.5C31.3939 13.6444 30.6091 12.9444 29.6498 12.9444H19.1852C18.2259 12.9444 17.4411 13.6444 17.4411 14.5V26.9444C17.4411 27.8 18.2259 28.5 19.1852 28.5ZM17.4411 2.05556V8.27778C17.4411 9.13333 18.2259 9.83333 19.1852 9.83333H29.6498C30.6091 9.83333 31.3939 9.13333 31.3939 8.27778V2.05556C31.3939 1.2 30.6091 0.5 29.6498 0.5H19.1852C18.2259 0.5 17.4411 1.2 17.4411 2.05556Z" fill="white"/>
        </svg>
        <span class="title-text">トピックリスト</span>
    </div>
    <div class="list-group list-group-custom">
        <button href="#" class="list-group-item active">全ての単語</button>
        <button href="#" class="list-group-item">コンプーター</button>
        <button href="#" class="list-group-item">ネットワーク</button>
        <button href="#" class="list-group-item">プログラミング</button>
        <button href="#" class="list-group-item">コンプーター</button>
        <button href="#" class="list-group-item">ネットワーク</button>
        <button href="#" class="list-group-item">プログラミング</button>
        <button href="#" class="list-group-item">コンプーター</button>
        <button href="#" class="list-group-item">ネットワーク</button>
        <button href="#" class="list-group-item">プログラミング</button>

  </div>
</div>

<script>
  $(document).ready(function(){
    $('.list-group-item').click(function(){
      $('.list-group-item').removeClass('active');
      $(this).addClass('active');
    });
  });
</script>
