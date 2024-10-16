<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Review HTML</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;700;900&display=swap");
body {

  font-family: "Mulish", sans-serif;
  margin: 5px;
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

.card {
  display: flex;
  flex-direction:column;
  width: 570px;
  padding: 50px 65px;
  border-radius: 10px;
}

  h1 {
    font-weight: bold;
    font-size: 22px;
    color: white;
    margin-bottom: 15px;
  }

    label {
      display: block;
      position: relative;
      svg {
        position: absolute;
        top: 50%;
        left: 30px;
        transform: translateY(-50%);
      }

  .comment {
    display: flex;
    flex-direction: column;
    padding: 35px;
    border-radius: 5px;
    margin-bottom: 10px;

    &_header {
      display: flex;
      align-items: center;
      margin-bottom: 25px;
      &-pic {
        display: flex;
        width: 40px;
        height: 40px;
        background-color: #d56a6a;
        border-radius: 50%;
      }
      h2 {
        font-size: 18px;
        font-weight: bold;
        color: white;
        margin-bottom: 0px;
        margin-left: 10px;
      }
    }
    &_content {
      font-size: 16px;
      color: white;
    }
    &_footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      span {
        font-size: 14px;
        font-weight: 700;
        color: #8c8aa7;
      }
      button {
        background-color: transparent;
        padding: 8px 10px;
        border: 1px solid #1f1e2d;
        display: flex;
        align-items: center;
        color: #8c8aa7;
        border-radius: 3px;
        svg {
          margin-right: 8px;
        }
      }
    }
  }
}

    </style>
</head>
<body>
    <div class="card">
        <h1>Reviews</h1>




        <div class="comment">
          <div class="comment_header d-flex">
            <div class="comment_header-pic">
                <img src="{{ asset('img/b.jpg') }}" alt="">
            </div>
            <div>
            <h2>Jesse Hopkins</h2>
          <div class="comment_content">
            <p>
              Gorgeous design! Even more responsive than the previous version. A
              pleasure to use!
            </p>
          </div>
            <span>Feb 13, 2021</span>
            </div>
        </div>

        <div class="comment">
          <div class="comment_header">
            <div class="comment_header-pic"></div>
            <h2>Alice Banks</h2>
          </div>
          <div class="comment_content">
            <p>
              The device has a clean design, and the metal housing feels sturdy in
              my hands. Soft rounded corners make it a pleasure to look at.
            </p>
          </div>
          <div class="comment_footer">
            <span>Feb 13, 2021</span>
            <button>
              <svg
                width="14"
                height="18"
                viewBox="0 0 14 18"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M0 9V15.4C0 16.2837 0.716344 17 1.6 17H11.2C12.0837 17 12.8 16.2837 12.8 15.4V9"
                  stroke="#8C8AA7"
                  stroke-width="1.6"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M9.59995 4.2L6.39995 1L3.19995 4.2"
                  stroke="#8C8AA7"
                  stroke-width="1.6"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M6.4 1V11.4"
                  stroke="#8C8AA7"
                  stroke-width="1.6"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <span>Share</span>
            </button>
          </div>
        </div>
      </div>
</body>
</html>
