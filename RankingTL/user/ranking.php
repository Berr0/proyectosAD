<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>80's Arcade Leaderboard</title>
    <style>
      /* Add your CSS styles here */
      body {
        background-image: url('./arcade-bg.png');
        font-family: 'arcade';
        color: white;
        text-align: center;
      }
      h1 {
        font-size: 48px;
        margin-top: 100px;
      }
      .rank, .player-input, .score {
        display: inline-block;
        text-align: center;
        vertical-align: top;
        margin: 20px;
      }
      .rank {
        font-size: 36px;
        width: 30px;
      }
      .player-input {
        font-size: 24px;
        width: 50px;
      }
      .score {
        font-size: 36px;
        width: 70px;
      }
      .rank-text, .player-text, .score-text {
        display: inline-block;
        vertical-align: top;
        font-size: 18px;
        width: 30px;
        text-align: center;
        margin-right: 100px;
        margin-left: 60px;
        margin-bottom: 20px;
        font-size: 28px;
        text-transform: uppercase;
      }
    </style>
  </head>
  <body>
    <h1>Leaderboard</h1>
    <div class="rank-text">Rank</div>
    <div class="player-text">Name</div>
    <div class="score-text">Score</div>
    <br><br>
    <div class="rank">1.</div>
    <input type="text" class="player-input" maxlength="1">
    <input type="text" class="player-input" maxlength="1">
    <input type="text" class="player-input" maxlength="1">
    <div class="score">10000</div>
    <br><br>
    <div class="rank">2.</div>
    <input type="text" class="player-input" maxlength="1">
    <input type="text" class="player-input" maxlength="1">
    <input type="text" class="player-input" maxlength="1">
    <div class="score"> 9000</div>
    <!-- Add more scores and players here -->
  </body>
</html>