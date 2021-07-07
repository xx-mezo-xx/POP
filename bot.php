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
                   'caption'=>'- 𝐖𝐄𝐋𝐂𝐎𝐌𝐄 𝐓𝐎 𝐌𝐄𝐙𝐎 𝐓𝐎𝐎𝐋⚙
↯Tele↯.                     ↯CH↯\n:-  @Y_4_V              :-  @TTTPTTTTT',
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'أضــافــة حــســاب🖤','callback_data'=>'login']],
                          [['text'=>"المــطــور♻️",'url'=>"https://t.me/Y_4_V"]],
                      ]
                  ])
              ]);   
          } 
if($text == '/video'){
              $bot->sendvideo([ 'chat_id'=>$chatId,
              'video'=>"https://t.me/G_D_W/8",
              'caption'=>'طرق السحب',
                      'reply_markup'=>json_encode([
                      'inline_keyboard'=>[                       
                       [['text'=>"للــتــواصــل🤓", 'url'=>"https://t.me/Mezo21_bot"]],
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
          							'text'=>"الـحـسـاب مـحـظـور❌"
          					]);
          				} else {
          					$bot->sendMessage([
          							'chat_id'=>$chatId,
          							'parse_mode'=>'markdown',
          							'text'=>"اتـأكـد مـن الـيـوزر أو الـبـاس يـسـتـا⚙️"
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
          							'text'=>"تم اضافه حساب جديد الى الاداه 💣.*\n _Username_ : [$user])(instagram.com/$user)\n_Account Name_ : _{$body->full_name}_",
												'reply_to_message_id'=>$mid		
          					]);
          				$keyboard = ['inline_keyboard'=>[
										[['text'=>"أضــافــة حــســاب🖤",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"🗑️",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'الـصـفـحـة الـرئـيـسـيـة🚀','callback_data'=>'back']];
		              $bot->editMessageText([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                  'text'=>"الـحـسـابـات الـوهـمـيـة⏰",
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
          		        'text'=>"تم التعديل.",
          		        'reply_to_message_id'=>$config['mid']
          		    ]);
          		    $config['filter'] = $text;
          		    $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                      'text'=>"𝙷𝙸 𝙱𝚁𝙾 𝙸𝙽 𝚃𝙷𝙴 𝙲𝙾𝙽𝚃𝚁𝙾𝙻 𝙱𝚈 ~ @Y_OMO"
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'أضــافــة حــســاب جــديــد🖤','callback_data'=>'login']],
                          [['text'=>'طـرق سـحـب  الـيـوزارات🌚','callback_data'=>'grabber']],
                          [['text'=>'بـدء الـصـيـد⏸','callback_data'=>'run'],['text'=>'ايـقـاف الـصـيـد▶️','callback_data'=>'stop']],
                              [['text'=>'حـالـة الـحـسـابـات الـوهـمـيـة🌎','callback_data'=>'status']],
                              [['text'=>'الـمـطـور☄️','url'=>'t.me/Y_4_V'],['text'=>' قـنـاتـى 💣','url'=>'t.me/TTTPTTTTT']],
                      ]
                  ])
                  ]);
          		    $config['mode'] = null;
		              $config['mid'] = null;
		              file_put_contents('config.json', json_encode($config));
          		  } else {
          		    bot('sendMessage',[
          		        'chat_id'=>$chatId,
          		        'text'=>'- يرجى ارسال رقم فقط .'
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
							'text'=>"هذا البوت مدفوع و ليس مجاني 
يمكنك الحصول على نسخه من البوت بعد شرائه من المطور 
اضغط في الاسفل لمراسله المطور 🌚🤍",
							'reply_markup'=>json_encode([
                  'inline_keyboard'=>[
                      [['text'=>'لـمـراسـلـة الـمـطـور🌐','url'=>'t.me/Y_4_V']]
					  [['text'=>"قـنـاة صـيـد الـمـشـتركـيـن🦈", 'url'=>"t.me/TTTPTTTTT"]],
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
									[['text'=>"أضــافــة حــســاب🖤",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"تسجيل الخروج",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'الـصـفـحـة الـرئـيـسـيـة🚀','callback_data'=>'back']];
		              $bot->sendMessage([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                   'text'=>"الـحـسـابـات الـوهـمـيـة⏰",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
          } elseif($data == 'addL'){
          	
          	$config['mode'] = 'addL';
          	$config['mid'] = $mid;
          	file_put_contents('config.json', json_encode($config));
          	$bot->sendMessage([
          			'chat_id'=>$chatId,
          			'text'=>"  ارسل الحساب بهذا النمط `user:pass`",
          			'parse_mode'=>'markdown'
          	]);
          } elseif($data == 'grabber'){
            
            $for = $config['for'] != null ? $config['for'] : 'حـدد الـحـسـاب🙇🏻‍♂️';
            $count = count(explode("\n", file_get_contents($for)));
            $bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                        [['text'=>'بـحـث بـ الـكـلـمـات🐝','callback_data'=>'search']],
                        [['text'=>'بـحـث هـاشـتك #️⃣','callback_data'=>'hashtag'],['text'=>'مـن الأكـسـبـلـور📈','callback_data'=>'explore']],
                        [['text'=>'المـتـابـعـيـن🦄','callback_data'=>'followers'],['text'=>"المـتـابـعـهـم🦁",'callback_data'=>'following']],
                        [['text'=>"الـحـسـاب الـمـحـدد : $for",'callback_data'=>'for']],
                        [['text'=>'لـسـتـة يـوزارات جـديـدة🆕','callback_data'=>'newList'],['text'=>'لـسـتـة يـوزارات سـابــقـة🗝','callback_data'=>'append']],
                        [['text'=>'♻️ الصفحه الرئيسية ','callback_data'=>'back']],
                        [['text'=>'الـمـطـور🥊','url'=>'t.me/Y_4_V'],['text'=>'قـنـاتـى♻️','url'=>'t.me/TTTPTTTTT']],
                    ]
                ])
            ]);
          } elseif($data == 'search'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"الان قم بأرسال الكلمه التريد البحث عليها و ايضا يمكنك من استخدام اكثر من كلمه عن طريق وضع فواصل بين الكلمات⚔️"
            ]);
            $config['mode'] = 'search';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'followers'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"الان قم بأرسال اليوزر التريد سحب متابعيه و ايضا يمكنك من استخدام اكثر من يوزر عن طريق وضع فواصل بين اليوزرات 🔪"
            ]);
            $config['mode'] = 'followers';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'following'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"الان قم بأرسال اليوزر التريد سحب الذي  متابعهم و ايضا يمكنك من استخدام اكثر من يوزر عن طريق وضع فواصل بين اليوزرات 🔪"
            ]);
            $config['mode'] = 'following';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'hashtag'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"الان قم بأرسال الهاشتاك بدون علامه # يمكنك 🧿استخدام هاشتاك واحد فقط"
            ]);
            $config['mode'] = 'hashtag';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'newList'){
            file_put_contents('a','new');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"تـم اخـتـيـار لـسـتـة جـديـدة بـنـجـاح✅",
							'show_alert'=>1
						]);
          } elseif($data == 'append'){ 
            file_put_contents('a', 'ap');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"تـم اخـتـيـار لـسـتـة سـابـقـة بـنـجـاح✅",
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
                  'text'=>"حـدد حـسـاب🙇🏻‍♂️",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ضـيـف حـسـاب الأول😒",
							'show_alert'=>1
						]);
            }
          } elseif($data == 'selectFollowers'){
            bot('sendMessage',[
                'chat_id'=>$chatId,
                'text'=>'قـم بـ أرسـال عـدد الـمـتـابـعـيـن😊'  
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
                  'text'=>"حـدد حـسـاب🙇🏻‍♂️",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ضـيـف حـسـاب الأول😒",
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
                  'text'=>"حـدد حـسـاب🙇🏻‍♂️",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"ضـيـف حـسـاب الأول😒",
							'show_alert'=>1
						]);
            }
          }elseif($data == 'stopgr'){
            shell_exec('screen -S gr -X quit');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"تـم الأنـتـهـاء مـن الـسـحـب",
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
                       [['text'=>'بـحـث بـ الـكـلـمـات🐝','callback_data'=>'search']],
                        [['text'=>'بـحـث هـاشـتك #️⃣','callback_data'=>'hashtag'],['text'=>'مـن الأكـسـبـلـور📈','callback_data'=>'explore']],
                        [['text'=>'المـتـابـعـيـن🦄','callback_data'=>'followers'],['text'=>"المـتـابـعـهـم🦁",'callback_data'=>'following']],
                        [['text'=>"الـحـسـاب الـمـحـدد : $for",'callback_data'=>'for']],
                        [['text'=>'لـسـتـة يـوزارات جـديـدة🆕','callback_data'=>'newList'],['text'=>'لـسـتـة يـوزارات سـابــقـة🗝','callback_data'=>'append']],
                        [['text'=>'الـصـفـحـة الـرئـيـسـيـة🚀','callback_data'=>'back']],
                        [['text'=>'الـمـطـور🥊','url'=>'t.me/Y_4_V'],['text'=>'قـنـاتـى♻️ ','url'=>'t.me/TTTPTTTTT']],
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
							'text'=>"حاله الحسابات : \n\n $status",
							'parse_mode'=>'markdown'
						]);
				} elseif($data == 'back'){
          	$bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                     'text'=>"اهلا عزيزي ✔️
في الاسفل هي حساباتك الوهميه المسجله في الاداة",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'أضــافــة حــســاب جــديــد🖤','callback_data'=>'login']],
                          [['text'=>'طـرق سـحـب  الـيـوزارات🌚','callback_data'=>'grabber']],
                          [['text'=>'بـدء الـصـيـد⏸','callback_data'=>'run'],['text'=>'ايـقـاف الـصـيـد▶️','callback_data'=>'stop']],
                         [['text'=>'حـالـة الـحـسـابـات الـوهـمـيـة🌎','callback_data'=>'status']],
                         [['text'=>'الـمـطـور☄️','url'=>'t.me/Y_4_V'],['text'=>'قـنـاتـى♻️','url'=>'t.me/TTTPTTTTT']],
                      ]
                  ])
                  ]);
          } else {
          	$data = explode('&',$data);
          	if($data[0] == 'del'){
          		
          		unset($accounts[$data[1]]);
          		file_put_contents('accounts.json', json_encode($accounts));
              $keyboard = ['inline_keyboard'=>[
							[['text'=>"أضـف حــســاب جــديــد🖤",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"تسجيل الخروج",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'الـصـفـحـة الـرئـيـسـيـة🚀','callback_data'=>'back']];
		              $bot->editMessageText([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                    'text'=>"أضــافــة حــســاب جــديــد🖤",
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
                            [['text'=>'بـحـث بـ الـكـلـمـات🐝','callback_data'=>'search']],
                        [['text'=>'بـحـث هـاشـتك #️⃣','callback_data'=>'hashtag'],['text'=>'مـن الأكـسـبـلـور📈','callback_data'=>'explore']],
                        [['text'=>'المـتـابـعـيـن🦄','callback_data'=>'followers'],['text'=>"المـتـابـعـهـم🦁",'callback_data'=>'following']],
                        [['text'=>"الـحـسـاب الـمـحـدد : $for",'callback_data'=>'for']],
                        [['text'=>'لـسـتـة يـوزارات جـديـدة🆕','callback_data'=>'newList'],['text'=>'لـسـتـة يـوزارات سـابــقـة🗝','callback_data'=>'append']],
                        [['text'=>'الـصـفـحـة الـرئـيـسـيـة🚀','callback_data'=>'back']],
                        [['text'=>'الـمـطـور🥊','url'=>'t.me/Y_4_V'],['text'=>'قـنـاتـى♻️ ','url'=>'t.me/TTTPTTTTT']],
                    ]
                ])
            ]);
          	} elseif($data[0] == 'start'){
          	  file_put_contents('screen', $data[1]);
          	  $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                       'text'=>"اهلا بك مره اخرى عزيزي ✔️
اختر ما تريده من الاسفل 👇",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'أضــافــة حــســاب جــديــد🖤','callback_data'=>'login']],
                          [['text'=>'طـرق سـحـب  الـيـوزارات🌚','callback_data'=>'grabber']],
                          [['text'=>'بـدء الـصـيـد⏸','callback_data'=>'run'],['text'=>'ايـقـاف الـصـيـد▶️','callback_data'=>'stop']],
                         [['text'=>'حـالـة الـحـسـابـات الـوهـمـيـة🌎','callback_data'=>'status']],
                         [['text'=>'الـمـطـور☄️','url'=>'t.me/y_4_v'],['text'=>'قـنـاتـى♻️','url'=>'t.me/TTTPTTTTT']],
                      ]
                  ])
                  ]);
              exec('screen -dmS '.explode(':',$data[1])[0].' php start.php');
              $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"*بدء الصيد.*\n Account: `".explode(':',$data[1])[0].'`',
                'parse_mode'=>'markdown'
              ]);
          	} elseif($data[0] == 'stop'){
          	  $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                      'text'=>"اهلا بك مره اخرى عزيزي ✔️
اختر ما تريده من الاسفل 👇",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'أضــافــة حــســاب جــديــد🖤د','callback_data'=>'login']],
                          [['text'=>'طـرق سـحـب  الـيـوزارات🌚','callback_data'=>'grabber']],
                          [['text'=>'بـدء الـصـيـد⏸','callback_data'=>'run'],['text'=>'▶️ ايقاف الصيد','callback_data'=>'stop']],
                         [['text'=>'حـالـة الـحـسـابـات الـوهـمـيـة🌎','callback_data'=>'status']],
                         [['text'=>'الـمـطـور☄️','url'=>'t.me/Y_4_V'],['text'=>'قـنـاتـى♻️','url'=>'t.me/TTTPTTTTT']],
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