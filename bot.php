<?php
date_default_timezone_set('Africa/Cairo');
if(!file_exists('config.json')){
	$token = readline('HI Mezo Enter Token: ');
	$id = readline('Enter Id: ');
	file_put_contents('config.json', json_encode(['id'=>$id,'token'=>$token]));
	
} else {
		  $config = json_decode(file_get_contents('config.json'),1);
	$token = $config['token'];
	$id = $config['id'];
}

if(!file_exists('accounts.json')){
    file_put_contents('accounts.json',json_encode([]));
}
include 'index.php';
try {
	$callback = function ($update, $bot) {
		global $id;
		if($update != null){
		  $config = json_decode(file_get_contents('config.json'),1);
		  $config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
      $accounts = json_decode(file_get_contents('accounts.json'),1);
			if(isset($update->message)){
				$message = $update->message;
				$chatId = $message->chat->id;
				$text = $message->text;
				if($chatId == $id){
					if($text == '/start'){
              $bot->sendphoto([ 'chat_id'=>$chatId,
                  'photo'=>"https://t.me/G_D_W/8",
                   'caption'=>'- ๐๐๐๐๐๐๐ ๐๐ ๐๐๐๐ ๐๐๐๐โ
โฏTeleโฏ.ย ย ย ย ย ย ย ย ย ย ย ย ย ย ย ย ย ย ย ย  โฏCHโฏ\n:-ย  @Y_4_Vย ย ย ย ย ย ย ย ย ย ย ย ย  :-ย  @TTTPTTTTT',
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ุฃุถููุงูููุฉ ุญููุณููุงุจ๐ค','callback_data'=>'login']],
                          [['text'=>"ุงููููุทูููุฑโป๏ธ",'url'=>"https://t.me/Y_4_V"]],
                      ]
                  ])
              ]);   
          } 
if($text == '/video'){
              $bot->sendvideo([ 'chat_id'=>$chatId,
              'video'=>"https://t.me/G_D_W/8",
              'caption'=>'ุทุฑู ุงูุณุญุจ',
                      'reply_markup'=>json_encode([
                      'inline_keyboard'=>[                       
                       [['text'=>"ููููุชูููุงุตููู๐ค", 'url'=>"https://t.me/Mezo21_bot"]],
                       ]
                       ])
                       ]);
    
              $bot->sendvoice([ 'chat_id'=>$chatId,
                  'voice'=>"https://t.me/",
                           'caption'=>'  ',
                ]);
                      $bot->sendvoice([ 'chat_id'=>$chatId,
                  'voice'=>"https://t.me/",
              'caption'=>'  ',
             ]);
            
 }

    elseif($text != null){
          	if($config['mode'] != null){
          		$mode = $config['mode'];
          		if($mode == 'addL'){
          			$ig = new ig(['file'=>'','account'=>['useragent'=>'Instagram 27.0.0.7.97 Android (28\/9; 320dpi; 720x1544; OPPO; CPH2015; OP4C7D; mt6765; en_US)']]);
          			list($user,$pass) = explode(':',$text);
          			list($headers,$body) = $ig->login($user,$pass);
          			 echo $body;
          			$body = json_decode($body);
          			if(isset($body->message)){
          				if($body->message == 'challenge_required'){
          					$bot->sendMessage([
          							'chat_id'=>$chatId,
          							'parse_mode'=>'markdown',
          							'text'=>"ุงููุญูุณูุงุจ ููุญูุธููุฑโ"
          					]);
          				} else {
          					$bot->sendMessage([
          							'chat_id'=>$chatId,
          							'parse_mode'=>'markdown',
          							'text'=>"ุงุชูุฃููุฏ ููู ุงูููููุฒุฑ ุฃู ุงููุจูุงุณ ููุณูุชูุงโ๏ธ"
          					]);
          				}
          			} elseif(isset($body->logged_in_user)) {
          				$body = $body->logged_in_user;
          				preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $headers, $matches);
								  $CookieStr = "";
								  foreach($matches[1] as $item) {
								      $CookieStr .= $item."; ";
								  }
          				$account = ['cookies'=>$CookieStr,'useragent'=>'Instagram 27.0.0.7.97 Android (28\/9; 320dpi; 720x1544; OPPO; CPH2015; OP4C7D; mt6765; en_US)'];
          				
          				$accounts[$text] = $account;
          				file_put_contents('accounts.json', json_encode($accounts));
          				$mid = $config['mid'];
          				$bot->sendMessage([
          				      'parse_mode'=>'markdown',
          							'chat_id'=>$chatId,
          							'text'=>"ุชู ุงุถุงูู ุญุณุงุจ ุฌุฏูุฏ ุงูู ุงูุงุฏุงู ๐ฃ.*\n _Username_ : [$user])(instagram.com/$user)\n_Account Name_ : _{$body->full_name}_",
												'reply_to_message_id'=>$mid		
          					]);
          				$keyboard = ['inline_keyboard'=>[
										[['text'=>"ุฃุถููุงูููุฉ ุญููุณููุงุจ๐ค",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"๐๏ธ",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'ุงููุตูููุญูุฉ ุงููุฑุฆูููุณูููุฉ๐','callback_data'=>'back']];
		              $bot->editMessageText([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                  'text'=>"ุงููุญูุณูุงุจูุงุช ุงูููููููููุฉโฐ",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
		              $config['mode'] = null;
		              $config['mid'] = null;
		              file_put_contents('config.json', json_encode($config));
          			}
          		}  elseif($mode == 'selectFollowers'){
          		  if(is_numeric($text)){
          		    bot('sendMessage',[
          		        'chat_id'=>$chatId,
          		        'text'=>"ุชู ุงูุชุนุฏูู.",
          		        'reply_to_message_id'=>$config['mid']
          		    ]);
          		    $config['filter'] = $text;
          		    $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                      'text'=>"๐ท๐ธ ๐ฑ๐๐พ ๐ธ๐ฝ ๐๐ท๐ด ๐ฒ๐พ๐ฝ๐๐๐พ๐ป ๐ฑ๐ ~ @Y_OMO"
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ุฃุถููุงูููุฉ ุญููุณููุงุจ ุฌููุฏูููุฏ๐ค','callback_data'=>'login']],
                          [['text'=>'ุทูุฑู ุณูุญูุจ  ุงูููููุฒุงุฑุงุช๐','callback_data'=>'grabber']],
                          [['text'=>'ุจูุฏุก ุงููุตูููุฏโธ','callback_data'=>'run'],['text'=>'ุงููููุงู ุงููุตูููุฏโถ๏ธ','callback_data'=>'stop']],
                              [['text'=>'ุญูุงููุฉ ุงููุญูุณูุงุจูุงุช ุงูููููููููุฉ๐','callback_data'=>'status']],
                              [['text'=>'ุงููููุทููุฑโ๏ธ','url'=>'t.me/Y_4_V'],['text'=>' ููููุงุชูู ๐ฃ','url'=>'t.me/TTTPTTTTT']],
                      ]
                  ])
                  ]);
          		    $config['mode'] = null;
		              $config['mid'] = null;
		              file_put_contents('config.json', json_encode($config));
          		  } else {
          		    bot('sendMessage',[
          		        'chat_id'=>$chatId,
          		        'text'=>'- ูุฑุฌู ุงุฑุณุงู ุฑูู ููุท .'
          		    ]);
          		  }
          		} else {
          		  switch($config['mode']){
          		    case 'search': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php search.php');
          		      break;
          		      case 'followers': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php followers.php');
          		      break;
          		      case 'following': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php following.php');
          		      break;
          		      case 'hashtag': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php hashtag.php');
          		      break;
          		  }
          		}
          	}
          }
				} else {
					$bot->sendMessage([
							'chat_id'=>$chatId,
							'text'=>"ูุฐุง ุงูุจูุช ูุฏููุน ู ููุณ ูุฌุงูู 
ููููู ุงูุญุตูู ุนูู ูุณุฎู ูู ุงูุจูุช ุจุนุฏ ุดุฑุงุฆู ูู ุงููุทูุฑ 
ุงุถุบุท ูู ุงูุงุณูู ููุฑุงุณูู ุงููุทูุฑ ๐๐ค",
							'reply_markup'=>json_encode([
                  'inline_keyboard'=>[
                      [['text'=>'ููููุฑุงุณูููุฉ ุงููููุทููุฑ๐','url'=>'t.me/Y_4_V']]
					  [['text'=>"ููููุงุฉ ุตูููุฏ ุงููููุดูุชุฑููููู๐ฆ", 'url'=>"t.me/TTTPTTTTT"]],
                  ]
							])
					]);
				}
			} elseif(isset($update->callback_query)) {
          $chatId = $update->callback_query->message->chat->id;
          $mid = $update->callback_query->message->message_id;
          $data = $update->callback_query->data;
          echo $data;
          if($data == 'login'){
              
        		$keyboard = ['inline_keyboard'=>[
									[['text'=>"ุฃุถููุงูููุฉ ุญููุณููุงุจ๐ค",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"ุชุณุฌูู ุงูุฎุฑูุฌ",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'ุงููุตูููุญูุฉ ุงููุฑุฆูููุณูููุฉ๐','callback_data'=>'back']];
		              $bot->sendMessage([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                   'text'=>"ุงููุญูุณูุงุจูุงุช ุงูููููููููุฉโฐ",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
          } elseif($data == 'addL'){
          	
          	$config['mode'] = 'addL';
          	$config['mid'] = $mid;
          	file_put_contents('config.json', json_encode($config));
          	$bot->sendMessage([
          			'chat_id'=>$chatId,
          			'text'=>"  ุงุฑุณู ุงูุญุณุงุจ ุจูุฐุง ุงูููุท `user:pass`",
          			'parse_mode'=>'markdown'
          	]);
          } elseif($data == 'grabber'){
            
            $for = $config['for'] != null ? $config['for'] : 'ุญูุฏุฏ ุงููุญูุณูุงุจ๐๐ปโโ๏ธ';
            $count = count(explode("\n", file_get_contents($for)));
            $bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                        [['text'=>'ุจูุญูุซ ุจู ุงููููููููุงุช๐','callback_data'=>'search']],
                        [['text'=>'ุจูุญูุซ ููุงุดูุชู #๏ธโฃ','callback_data'=>'hashtag'],['text'=>'ููู ุงูุฃููุณูุจููููุฑ๐','callback_data'=>'explore']],
                        [['text'=>'ุงูููุชูุงุจูุนูููู๐ฆ','callback_data'=>'followers'],['text'=>"ุงูููุชูุงุจูุนูููู๐ฆ",'callback_data'=>'following']],
                        [['text'=>"ุงููุญูุณูุงุจ ุงููููุญูุฏุฏ : $for",'callback_data'=>'for']],
                        [['text'=>'ููุณูุชูุฉ ูููุฒุงุฑุงุช ุฌูุฏููุฏุฉ๐','callback_data'=>'newList'],['text'=>'ููุณูุชูุฉ ูููุฒุงุฑุงุช ุณูุงุจููููุฉ๐','callback_data'=>'append']],
                        [['text'=>'โป๏ธ ุงูุตูุญู ุงูุฑุฆูุณูุฉ ','callback_data'=>'back']],
                        [['text'=>'ุงููููุทููุฑ๐ฅ','url'=>'t.me/Y_4_V'],['text'=>'ููููุงุชููโป๏ธ','url'=>'t.me/TTTPTTTTT']],
                    ]
                ])
            ]);
          } elseif($data == 'search'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"ุงูุงู ูู ุจุฃุฑุณุงู ุงููููู ุงูุชุฑูุฏ ุงูุจุญุซ ุนูููุง ู ุงูุถุง ููููู ูู ุงุณุชุฎุฏุงู ุงูุซุฑ ูู ูููู ุนู ุทุฑูู ูุถุน ููุงุตู ุจูู ุงููููุงุชโ๏ธ"
            ]);
            $config['mode'] = 'search';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'followers'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"ุงูุงู ูู ุจุฃุฑุณุงู ุงูููุฒุฑ ุงูุชุฑูุฏ ุณุญุจ ูุชุงุจุนูู ู ุงูุถุง ููููู ูู ุงุณุชุฎุฏุงู ุงูุซุฑ ูู ููุฒุฑ ุนู ุทุฑูู ูุถุน ููุงุตู ุจูู ุงูููุฒุฑุงุช ๐ช"
            ]);
            $config['mode'] = 'followers';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'following'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"ุงูุงู ูู ุจุฃุฑุณุงู ุงูููุฒุฑ ุงูุชุฑูุฏ ุณุญุจ ุงูุฐู  ูุชุงุจุนูู ู ุงูุถุง ููููู ูู ุงุณุชุฎุฏุงู ุงูุซุฑ ูู ููุฒุฑ ุนู ุทุฑูู ูุถุน ููุงุตู ุจูู ุงูููุฒุฑุงุช ๐ช"
            ]);
            $config['mode'] = 'following';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'hashtag'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"ุงูุงู ูู ุจุฃุฑุณุงู ุงููุงุดุชุงู ุจุฏูู ุนูุงูู # ููููู ๐งฟุงุณุชุฎุฏุงู ูุงุดุชุงู ูุงุญุฏ ููุท"
            ]);
            $config['mode'] = 'hashtag';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'newList'){
            file_put_contents('a','new');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ุชูู ุงุฎูุชูููุงุฑ ููุณูุชูุฉ ุฌูุฏููุฏุฉ ุจูููุฌูุงุญโ",
							'show_alert'=>1
						]);
          } elseif($data == 'append'){ 
            file_put_contents('a', 'ap');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ุชูู ุงุฎูุชูููุงุฑ ููุณูุชูุฉ ุณูุงุจูููุฉ ุจูููุฌูุงุญโ",
							'show_alert'=>1
						]);
						
          } elseif($data == 'for'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'forg&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"ุญูุฏุฏ ุญูุณูุงุจ๐๐ปโโ๏ธ",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ุถูููู ุญูุณูุงุจ ุงูุฃูู๐",
							'show_alert'=>1
						]);
            }
          } elseif($data == 'selectFollowers'){
            bot('sendMessage',[
                'chat_id'=>$chatId,
                'text'=>'ููู ุจู ุฃุฑุณูุงู ุนูุฏุฏ ุงููููุชูุงุจูุนูููู๐'  
            ]);
            $config['mode'] = 'selectFollowers';
          	$config['mid'] = $mid;
          	file_put_contents('config.json', json_encode($config));
          } elseif($data == 'run'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'start&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"ุญูุฏุฏ ุญูุณูุงุจ๐๐ปโโ๏ธ",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ุถูููู ุญูุณูุงุจ ุงูุฃูู๐",
							'show_alert'=>1
						]);
            }
          }elseif($data == 'stop'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'stop&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"ุญูุฏุฏ ุญูุณูุงุจ๐๐ปโโ๏ธ",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ุถูููู ุญูุณูุงุจ ุงูุฃูู๐",
							'show_alert'=>1
						]);
            }
          }elseif($data == 'stopgr'){
            shell_exec('screen -S gr -X quit');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ุชูู ุงูุฃููุชูููุงุก ููู ุงููุณูุญูุจ",
							'show_alert'=>1
						]);
						$for = $config['for'] != null ? $config['for'] : 'Select Account';
            $count = count(explode("\n", file_get_contents($for)));
						$bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                       [['text'=>'ุจูุญูุซ ุจู ุงููููููููุงุช๐','callback_data'=>'search']],
                        [['text'=>'ุจูุญูุซ ููุงุดูุชู #๏ธโฃ','callback_data'=>'hashtag'],['text'=>'ููู ุงูุฃููุณูุจููููุฑ๐','callback_data'=>'explore']],
                        [['text'=>'ุงูููุชูุงุจูุนูููู๐ฆ','callback_data'=>'followers'],['text'=>"ุงูููุชูุงุจูุนูููู๐ฆ",'callback_data'=>'following']],
                        [['text'=>"ุงููุญูุณูุงุจ ุงููููุญูุฏุฏ : $for",'callback_data'=>'for']],
                        [['text'=>'ููุณูุชูุฉ ูููุฒุงุฑุงุช ุฌูุฏููุฏุฉ๐','callback_data'=>'newList'],['text'=>'ููุณูุชูุฉ ูููุฒุงุฑุงุช ุณูุงุจููููุฉ๐','callback_data'=>'append']],
                        [['text'=>'ุงููุตูููุญูุฉ ุงููุฑุฆูููุณูููุฉ๐','callback_data'=>'back']],
                        [['text'=>'ุงููููุทููุฑ๐ฅ','url'=>'t.me/Y_4_V'],['text'=>'ููููุงุชููโป๏ธ ','url'=>'t.me/TTTPTTTTT']],
                    ]
                ])
            ]);
          } elseif($data == 'explore'){
            exec('screen -dmS gr php explore.php');
          } elseif($data == 'status'){
					$status = '';
					foreach($accounts as $account => $ac){
						$c = explode(':', $account)[0];
						$x = exec('screen -S '.$c.' -Q select . ; echo $?');
						if($x == '0'){
				        $status .= "*$account* ~> _Working_\n";
				    } else {
				        $status .= "*$account* ~> _Stop_\n";
				    }
					}
					$bot->sendMessage([
							'chat_id'=>$chatId,
							'text'=>"ุญุงูู ุงูุญุณุงุจุงุช : \n\n $status",
							'parse_mode'=>'markdown'
						]);
				} elseif($data == 'back'){
          	$bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                     'text'=>"ุงููุง ุนุฒูุฒู โ๏ธ
ูู ุงูุงุณูู ูู ุญุณุงุจุงุชู ุงูููููู ุงููุณุฌูู ูู ุงูุงุฏุงุฉ",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ุฃุถููุงูููุฉ ุญููุณููุงุจ ุฌููุฏูููุฏ๐ค','callback_data'=>'login']],
                          [['text'=>'ุทูุฑู ุณูุญูุจ  ุงูููููุฒุงุฑุงุช๐','callback_data'=>'grabber']],
                          [['text'=>'ุจูุฏุก ุงููุตูููุฏโธ','callback_data'=>'run'],['text'=>'ุงููููุงู ุงููุตูููุฏโถ๏ธ','callback_data'=>'stop']],
                         [['text'=>'ุญูุงููุฉ ุงููุญูุณูุงุจูุงุช ุงูููููููููุฉ๐','callback_data'=>'status']],
                         [['text'=>'ุงููููุทููุฑโ๏ธ','url'=>'t.me/Y_4_V'],['text'=>'ููููุงุชููโป๏ธ','url'=>'t.me/TTTPTTTTT']],
                      ]
                  ])
                  ]);
          } else {
          	$data = explode('&',$data);
          	if($data[0] == 'del'){
          		
          		unset($accounts[$data[1]]);
          		file_put_contents('accounts.json', json_encode($accounts));
              $keyboard = ['inline_keyboard'=>[
							[['text'=>"ุฃุถูู ุญููุณููุงุจ ุฌููุฏูููุฏ๐ค",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"ุชุณุฌูู ุงูุฎุฑูุฌ",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'ุงููุตูููุญูุฉ ุงููุฑุฆูููุณูููุฉ๐','callback_data'=>'back']];
		              $bot->editMessageText([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                    'text'=>"ุฃุถููุงูููุฉ ุญููุณููุงุจ ุฌููุฏูููุฏ๐ค",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
          	} elseif($data[0] == 'forg'){
          	  $config['for'] = $data[1];
          	  file_put_contents('config.json',json_encode($config));
              $for = $config['for'] != null ? $config['for'] : 'Select';
              $count = count(file_get_contents($for));
              $bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                            [['text'=>'ุจูุญูุซ ุจู ุงููููููููุงุช๐','callback_data'=>'search']],
                        [['text'=>'ุจูุญูุซ ููุงุดูุชู #๏ธโฃ','callback_data'=>'hashtag'],['text'=>'ููู ุงูุฃููุณูุจููููุฑ๐','callback_data'=>'explore']],
                        [['text'=>'ุงูููุชูุงุจูุนูููู๐ฆ','callback_data'=>'followers'],['text'=>"ุงูููุชูุงุจูุนูููู๐ฆ",'callback_data'=>'following']],
                        [['text'=>"ุงููุญูุณูุงุจ ุงููููุญูุฏุฏ : $for",'callback_data'=>'for']],
                        [['text'=>'ููุณูุชูุฉ ูููุฒุงุฑุงุช ุฌูุฏููุฏุฉ๐','callback_data'=>'newList'],['text'=>'ููุณูุชูุฉ ูููุฒุงุฑุงุช ุณูุงุจููููุฉ๐','callback_data'=>'append']],
                        [['text'=>'ุงููุตูููุญูุฉ ุงููุฑุฆูููุณูููุฉ๐','callback_data'=>'back']],
                        [['text'=>'ุงููููุทููุฑ๐ฅ','url'=>'t.me/Y_4_V'],['text'=>'ููููุงุชููโป๏ธ ','url'=>'t.me/TTTPTTTTT']],
                    ]
                ])
            ]);
          	} elseif($data[0] == 'start'){
          	  file_put_contents('screen', $data[1]);
          	  $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                       'text'=>"ุงููุง ุจู ูุฑู ุงุฎุฑู ุนุฒูุฒู โ๏ธ
ุงุฎุชุฑ ูุง ุชุฑูุฏู ูู ุงูุงุณูู ๐",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ุฃุถููุงูููุฉ ุญููุณููุงุจ ุฌููุฏูููุฏ๐ค','callback_data'=>'login']],
                          [['text'=>'ุทูุฑู ุณูุญูุจ  ุงูููููุฒุงุฑุงุช๐','callback_data'=>'grabber']],
                          [['text'=>'ุจูุฏุก ุงููุตูููุฏโธ','callback_data'=>'run'],['text'=>'ุงููููุงู ุงููุตูููุฏโถ๏ธ','callback_data'=>'stop']],
                         [['text'=>'ุญูุงููุฉ ุงููุญูุณูุงุจูุงุช ุงูููููููููุฉ๐','callback_data'=>'status']],
                         [['text'=>'ุงููููุทููุฑโ๏ธ','url'=>'t.me/y_4_v'],['text'=>'ููููุงุชููโป๏ธ','url'=>'t.me/TTTPTTTTT']],
                      ]
                  ])
                  ]);
              exec('screen -dmS '.explode(':',$data[1])[0].' php start.php');
              $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"*ุจุฏุก ุงูุตูุฏ.*\n Account: `".explode(':',$data[1])[0].'`',
                'parse_mode'=>'markdown'
              ]);
          	} elseif($data[0] == 'stop'){
          	  $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                      'text'=>"ุงููุง ุจู ูุฑู ุงุฎุฑู ุนุฒูุฒู โ๏ธ
ุงุฎุชุฑ ูุง ุชุฑูุฏู ูู ุงูุงุณูู ๐",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ุฃุถููุงูููุฉ ุญููุณููุงุจ ุฌููุฏูููุฏ๐คุฏ','callback_data'=>'login']],
                          [['text'=>'ุทูุฑู ุณูุญูุจ  ุงูููููุฒุงุฑุงุช๐','callback_data'=>'grabber']],
                          [['text'=>'ุจูุฏุก ุงููุตูููุฏโธ','callback_data'=>'run'],['text'=>'โถ๏ธ ุงููุงู ุงูุตูุฏ','callback_data'=>'stop']],
                         [['text'=>'ุญูุงููุฉ ุงููุญูุณูุงุจูุงุช ุงูููููููููุฉ๐','callback_data'=>'status']],
                         [['text'=>'ุงููููุทููุฑโ๏ธ','url'=>'t.me/Y_4_V'],['text'=>'ููููุงุชููโป๏ธ','url'=>'t.me/TTTPTTTTT']],
                      ]
                    ])
                  ]);
              exec('screen -S '.explode(':',$data[1])[0].' -X quit');
          	}
          }
			}
		}
	};
	$bot = new EzTG(array('throw_telegram_errors'=>false,'token' => $token, 'callback' => $callback));
} catch(Exception $e){
	echo $e->getMessage().PHP_EOL;
	sleep(1);
}