
// プレーヤー削除時のアラート
  function player_delete_check(){
  	if(window.confirm('プレーヤーを削除してよろしいですか？\n※スコアも削除され復元できません。')){
  		return true;
  	}
  	else{
  		window.alert('キャンセルされました');
  		return false;
  	}
  }
// ゲーム削除時のアラート
  function game_delete_check(){
  	if(window.confirm('ゲームを削除してよろしいですか？\n※スコアも削除され復元できません。')){
  		return true;
  	}
  	else{
  		window.alert('キャンセルされました');
  		return false;
  	}
  }
// スコア確定時のアラート
  function score_confirm_check(){
  	if(window.confirm('スコアを確定してよろしいですか？')){
  		return true;
  	}
  	else{
  		window.alert('キャンセルされました');
  		return false;
  	}
  }
