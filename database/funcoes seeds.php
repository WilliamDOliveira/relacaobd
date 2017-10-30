<?php
    /**
     * name_random()
     * num_random()
     * phone_random()
     * email_random()
     * date_random() 
     * company_random()
     * rand( Nmin, Nmax)
     */
 
	/**
	* Chame essa função passando como parametro  o range/quantidade de numeros que deseja que ela retorno
	* Ex:. num_random( 5 )  = 87412
	* Retorna um String porque numeros grandes com mais de 10 caracteres quebram, se for necessário usar tipo numero converta o resultado dessa função
	*/
	function num_random( $range = 1 ){
		$num = [];
		for( $count = 0 ; $count < $range ; $count ++ ){
			$num[ $count ] =  rand( 0 , 9 );
		}
		return intval( $num = implode("", $num ) );
	}

	/**
	* Essa função irá retornar uma STRING com ddd mais o número, sem outros caracteres, se colocar o 1 como parametro então irá retornar o celular
	* Exemplo phone_random( ) = 4116729951 || phone_random(1) = 15993005559
	*/
	function phone_random( $cel = 0){
		$ddd = [ "11","12","13","14","15","16","17","18","19","21","22","24","27","28","31","32","33","34","35","37","38","41","42","43","44","45","46","47","48","49","51","53","54","55","61","62","63","64","65","66","67","68","69","71","73","74","75","77","79","81","82","83","84","85","86","87","88","89","91","92","93","94","95","96","97","98","99"
		];//67 ddd's brasil
		$phone[0] =$ddd[ rand( 0 , 66 ) ];
		$phone[1] = ( $cel == 0 ) ? $phone[1] = num_random(8) : $phone[1] = '9' . num_random(8) ;
		return $phone = implode("", $phone ) ;
	}
	//retorna um nome
	function name_random(){
		$names = [
		"Kula Diamond","Ash Crimson","Rugal Bernstein","Adelheid Bernstein","Orochi","Hakkesshu","Goenitz","Angel","Foxy","Krizalid","Zero","Igniz","Ron","Mukai","Shion","Magaki","Saiki","Alice","Andy Bogard","Antonov","Athena Asamiya","Bandeiras Hattori","Bao","Benimaru Nikaido","Billy Kane","Blue Mary","Bonne Jenet","Brian Battler","Chang Koehan","Chin Gentsai","Chizuru Kagura","Choi Bounge","Clark Still","Duck King","Duo Lon","Eiji Kisaragi","Elisabeth Blanctorche","Gai Tendo","Gato","Geese Howard","Goro Daimon","Heidern","Hein","Hinako Shijou","Hwa Jai","Hotaru Futaba","Iori Yagami","Jhun Hoon","Joe Higashi","Kasumi Todoh","Kim Kaphwan","King","Kukri","Kusanagi","Leona Heidern","Lin","Li Xiangfei","Love Heart","Luong","Lucky Glauber","Mai Shiranui","Maki Kagura","Malin","May Lee","Meitenkun","Mian","Momoko","Mui Mui","Nakoruru","Nelson","Oswald","Raiden","Ralf Jones","Ramon","Robert Garcia","Ryo Sakazaki","Saisyu Kusanagi","Seth","Shen Woo","Shingo Yabuki","Sho Hayate","Sie Kensou","Silber","Sylvie Paula Paula","Takuma Sakazaki","Terry Bogard","Tung Fu Rue","Vanessa","Verse","Whip","Wolfgang Krauser","Xanadu","Yuri Sakazaki","Zarina"
		];//94 names
		return $names[ rand( 0 , 93 ) ];
	}
	//retorna um email
	function email_random(){
		$host = [ "gmail" , "live",  "hotmail" , "terra", "yahoo" ];//5 cadastrados
		$name =  _firstName();
		$email = $name.'@'.$host[ rand( 0 , 4 ) ].'.com';
		return strtolower($email);
	}
	//função privada usada por outras funções, retorna o primeiro nome da função name_random
	function _firstName(){
		$name =  name_random();
		$name = explode( " " , $name );
		return $name[0];
	}
	/**
	* Retorna data por padrão Y-m-d se passar parametro 1 irá retornar em outro formato d-m-Y
	*  date_random() 2017-02-04 ||  date_random( 1 ) 04-02-2017
	*/
	function date_random( $dateDefault = 0 ){
		$year = rand( 1920, 2017 );
		$mounth = rand( 1 , 12 );
		$day = rand( 1 , 28 );
		$date = ( $dateDefault == 0 ) ?  $year. '-'.$mounth.'-'.$day  : $day. '-'.$mounth.'-'.$year;
		return $date;
	}
	//Retorna o nome de uma companhia
	function company_random(){
		$title = [ "Company", "Enterprise", "Development", "Research", "Economic","Sustainable Development","Technological Development","Business","Trading Company","Insurance Company","Public Limited Company","Private Company","Stock Company", "Business Strategy"];//14
		$name = _firstName();
		return $name.' '.$title[ rand( 0 , 13 ) ];
	}