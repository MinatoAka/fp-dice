<?php
@error_reporting(0);
$banner = "
:hhhhhhyyssssssssssssssssssssssssssssssssyyhhhhhh:
+MMMNmmmdyyssssssssssssssssssssssssssssyhdmmmNMMM+
+MNmmd+.                                  .+dmmNM+
+Nmms`                                      `smmN+
/mmy                                          ymm/
/mm/                                          /mm/
/mm/      `------------.  ---------.`         /mm/
/mm/      :mmmmmmmmmmmm+ `mmmmmmmmmmmh+`      /mm/
/mm/      :mmmh////////- `mmmm////+smmmd-     /mm/
/mm/      :mmmy          `mmmm      :mmmd     /mm/
/mm/      :mmmy          `mmmm      -mmmd     /mm/
/mm/      :mmmmddddddd+  `mmmm::::/odmmm/     /mm/
/mm/      :mmmdyyyyyyy/  `mmmmmmmmmmmds-      /mm/
/mm/      :mmmy          `mmmm:::::-.         /mm/
/mm/      :mmmy          `mmmm                /mm/
/mm/      :mmmy          `mmmm                /mm/
/mm/      :ddds          `dddd                /mm/
/mm/                                          /mm/
/mm/                                          /mm/
/mm/                                          /mm/
/mmy                                          ymm/
+Nmms`                                      `smmN+
+MNmmd+.                                  .+dmmNM+
+MMMNmmmdhyssssssssssssssssssssssssssssyhdmmmNMMM+
:hhhhhyyyssssssssssssssssssssssssssssssssyyyhhhhh:
\n";

function dices($send, $coki){
$ch = curl_init('https://faucetpay.io/dice/play');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = array();
	$headers[] = 'accept-encoding: json';
	$headers[] = 'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
	$headers[] = 'content-length: 136';
	$headers[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
	$headers[] = "cookie: ".$coki;
	$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36';
	$headers[] = 'x-requested-with: XMLHttpRequest';
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $send);
	$responses = curl_exec($ch);
	if ($responses == null){
 echo("failed");
    }else{
      return $responses;
   }
}
$pit = 0;
$pt = 10;
system('clear');
echo $banner;
sleep(3);
system('clear');
echo "Example Select :1 (fot BTC)\n\n";
echo "Select Coin You Want Use\n1.BTC\n2.ETH\n3.LTC\n4.DOGE\n5.BCH\n6.DASH\n7.DGB\nSelect : ";
$coin=trim(fgets(STDIN));
if($coin == 1){
	$coin = "BTC";
}
else if($coin == 2){
	$coin = "ETH";
}
else if($coin == 3){
	$coin = "LTC";
}
else if($coin == 4){
	$coin = "DOGE";
}
else if($coin == 5){
	$coin = "BCH";
}
else if($coin == 6){
	$coin = "DASH";
}
else if($coin == 7){
	$coin = "DGB";
}
system('clear');
echo "Config Dice For Faucetpay.io\n";
echo "Cookie : ";
$coki=trim(fgets(STDIN));
system('clear');
echo "Wait to Login ....\n";
sleep(3);
$bet = '0.00000001';
$wcs = number_format(rand(70,80),2);
$nas = 95 / $wcs;
$gp = number_format($nas, 5);
$prof = $gp * 100;
$prof = $prof / 100 * $bet;
$prof = (int)($prof*100000000) / 100000000;
$prof = number_format((float)$prof - $bet,8);
EDIT:
$send = "play=true&coin=".$coin."&client_seed=RUUFuGsc5lQPgMXdOVo&bet_amt=".$bet."&profit=".$prof."&payout=".$gp."&winning_chance=".$wcs."&prediction=1";
$log = dices($send, $coki);
$login = json_decode($log);
if($login->error == 0){
	system('clear');
	echo "Login Success....\n";
	$blk = $login->balance;
	echo "Config For Bet Set\n\n";
	echo "Example Bet Amount : 0.00000001 (minimum)\n";
	echo "Bet Amount : ";
	$bets=trim(fgets(STDIN));
	echo "Example Up Bet if Lose 100% (2x Bet)\n";
	echo "Change Bet if Lose : ";
	$cb=trim(fgets(STDIN));
	echo "Example Win Chance Min : 10 (minimum)\n";
	echo "Win Chance Min : ";
	$wcmin=trim(fgets(STDIN));
	echo "Example Win Chance Max : 94 (maximum)\n";
	echo "Win Chance Max : ";
	$wcmax=trim(fgets(STDIN));
	echo "Example Result Win Chance : 10 - 94 \n";
	echo "Win Chance : ".$wcmin." - ".$wcmax." \n";
	echo "Example Stop If Profit 200.00000000 \n";
	echo "Stop Profit : ";
	$sp=trim(fgets(STDIN));
	echo "Example Refresh on 0.01\n";
	echo "Refresh on : ";
	$ref=trim(fgets(STDIN));
	echo "Example Bet On : 1 (for HI)\n";
	echo "Bet On \n1.HI\n2.LOW\n3.Random\n";
	echo "Bet On : ";
	$pr=trim(fgets(STDIN));
	if($pr == 1){
		$prt = "HI";
		$pr = 1;
	}
	if($pr == 2){
		$prt = "LOW";
		$pr = 2;
	}
	if($pr == 3){
		$prt = "RANDOM";
		$pr = rand(1,2);
	}
	system('clear');
	echo "Result Your Config Bet Set\n\n";
	echo "Bet Amount : ".$bets."\n";
	echo "Auto Back to Bet set If WIN";
	echo "Change Bet If Lose : ".$cb."%\n";
	echo "Auto Win Chance : ".$wcmin." - ".$wcmax." \n";
	echo "Auto Stop If Profit : ".$sp."\n";
	echo "Bet On : ".$prt."\n\n";
	echo "Press Enter For Start Your Bet Set\nInput 1 For Edit Bet Set";
	$start=trim(fgets(STDIN));
	if($start == 1){
		goto EDIT;
	}
	system('clear');
$mjake = number_format(1, 8);
$cwin = 0;
$clos = 0;
RBS:	
while(true){
$rg = rand(1,3);
$bet = number_format($bets,8);
$wc = number_format(rand($wcmin,$wcmax),2);
$nas = 95 / $wc;
$gp = number_format($nas, 5);
$prof = $gp * 100;
$prof = $prof / 100 * $bet;
$prof = (int)($prof*100000000) / 100000000;
$prof = number_format((float)$prof - $bet,8);
$predic = $pr;
$send = "play=true&coin=".$coin."&client_seed=RUUFuGsc5lQPgMXdOVo&bet_amt=".$bet."&profit=".$prof."&payout=".$gp."&winning_chance=".$wc."&prediction=".$predic;
$ga = json_decode(dices($send, $coki),true);
	if($ga['error'] == 1){
		echo "\nToday Is Your Bad Day, Try Again Tomorrow\nYour balance is not enough\n";
		exit();
	}
	if($ga['win'] == 1){
		$pits = number_format($ga['balance'] - $blk, 8);
		$rak = number_format($pit + $prof, 8);
		$cwin++;
		echo"\r                                                                                         \r";
		echo "WIN	|| Profit : ".$rak." {$coin}\n";
echo "\rWin Streak : ".$cwin."	|| Lose Streak : ".$clos."	|| Ballance : ".$ga['balance']." {$coin}\r";
		if($pits >= $sp){
			echo "\nCongratulation Your Profit to Target\n\n";
			exit();
		}
		if($rak >= $ref){
			echo"\r                                                                                         \r";
			echo "Refresh......\n";
				if($rak >= $mjake){
					echo "\nCongratulation Your Get Jakepot \nTotal : ".$rak."\n\n";
					sleep($rg);
					goto RBS;
				}
			goto RBS;
		}
		goto RBS;
	}
	if($ga['win'] == 0){
		$pits = number_format($ga['balance'] - $blk, 8);
		$rak = number_format($pit - $bet, 8);
		echo"\r                                                                                         \r";
		echo "LOSE	|| Profit : ".$rak." {$coin}\n";
		$clos++;
echo "\rWin Streak : ".$cwin."	|| Lose Streak : ".$clos."	|| Ballance : ".$ga['balance']." {$coin}\r";
			$bet = number_format($bets,8);
			for ($i= 1; $i <= 100; $i++) { 
					$bet = number_format((float)$bet +(($cb / 100) * $bet) ,8);
					$wc = number_format(rand(10,20),2);
					$nas = 95 / $wc;
					$gp = number_format($nas, 5);
					$prof = $gp * 100;
					$prof = $prof / 100 * $bet;
					$prof = (int)($prof*100000000) / 100000000;
					$prof = number_format((float)$prof - $bet,8);
					$send = "play=true&coin=".$coin."&client_seed=RUUFuGsc5lQPgMXdOVo&bet_amt=".$bet."&profit=".$prof."&payout=".$gp."&winning_chance=".$wc."&prediction=1";
					$ga = json_decode(dices($send, $coki),true);
					if($ga['error'] == 1){
						echo "\nToday Is Your Bad Day, Try Again Tomorrow\nYour balance is not enough\n";
						exit();
					}
					if($ga['win'] == 1){
						$pits = number_format($ga['balance'] - $blk, 8);
						$rak = number_format($pit + $prof, 8);
						echo"\r                                                                                         \r";
						echo "WIN	|| Profit : ".$rak." {$coin}\n";
						$cwin++;
echo "\rWin Streak : ".$cwin."	|| Lose Streak : ".$clos."	|| Ballance : ".$ga['balance']." {$coin}\r";
						if($pits >= $sp){
							echo "\nCongratulation Your Profit to Target\n\n";
							exit();
						}
						if($rak >= $ref){
							echo"\r                                                                                         \r";
							echo "Refresh......\n";
								if($rak >= $mjake){
									echo "\nCongratulation Your Get Jakepot \nTotal : ".$rak."\n\n";
									sleep($rg);
									goto RBS;
								}
							goto RBS;
						}
						goto RBS;
					}
					if($ga['win'] == 0){
						$pits = number_format($ga['balance'] - $blk, 8);
						$rak = number_format($pit - $bet, 8);
						echo"\r                                                                                         \r";
						echo "LOSE	|| Profit : ".$rak." {$coin}\n";
						$clos++;
echo "\rWin Streak : ".$cwin."	|| Lose Streak : ".$clos."	|| Ballance : ".$ga['balance']." {$coin}\r";
					}
			}
	}
}
}else{
	echo "\nLogin Failed\n";
	exit();
}


?>