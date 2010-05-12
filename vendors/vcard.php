<?php

class vcard extends Object {

   public $vcard_birtda;//  Birthday YYYY-MM-DD
	public $vcard_f_name;//  Family name
	public $vcard_cellul;//  Cellular Phone Number  Mobile
	public $vcard_compan;//  Company Name
	public $vcard_h_addr;//  Street Address (home)
	public $vcard_h_city;//  City (home)
	public $vcard_h_coun;//  Country (home)
	public $vcard_h_fax ;//  Fax (home)
	public $vcard_h_mail;//  E-mail (home)
	public $vcard_h_phon;//  Phone (home)
	public $vcard_h_zip ;//  Zip-code (home)
	public $vcard_nickna;//  Nickname
	public $vcard_note  ;//  Note
	public $vcard_s_name;//  Given name
	public $vcard_uri   ;//  Homepage, URL
	public $vcard_w_addr;//  Street Address (work)
	public $vcard_w_city;//  City (work)
	public $vcard_w_coun;//  Country (work)
	public $vcard_w_fax ;//  Fax (work)
	public $vcard_w_mail;//  E-mail (work)
	public $vcard_w_phon;//  Phone (work)
	public $vcard_w_role;//  Function (work)
	public $vcard_w_titl;//  Title (work)
	public $vcard_w_zip ;//  Zip-code (work)
   public $vcard_w_uri ;//  Home URL
   public $vcard_h_uri ;//  WORK URL
   public $vcard_p_pager;// Pager Number
   public $fileName;    //  File Name Download or Save
   public $saveTo;      //  Save To Address Folder To Save (on Server)

   // private var
   private $vcard_addr;
   private $vcard_labl;
   private $vcard;      //  Vcard Data Set



   function __construct ($arData) {

     if(is_array($arData)) {

     $this->fileName=$arData["fileName"];
     $this->saveTo=$arData["saveTo"];

  	 $this->vcard_birtda=$arData["vcard_birtda"];
     $this->vcard_f_name=$arData["vcard_f_name"];
     $this->vcard_s_name=$arData["vcard_s_name"];
     $this->vcard_uri   =$arData["vcard_uri"];
     $this->vcard_nickna=$arData["vcard_nickna"];
	 $this->vcard_note  =$arData["vcard_note"];
	 $this->vcard_cellul=$arData["vcard_cellul"];
	 $this->vcard_compan=$arData["vcard_compan"];
     $this->vcard_p_pager=$arData["vcard_p_pager"];
     $this->vcard_c_mobile=$arData["vcard_c_mobile"];

	 $this->vcard_h_addr=$arData["vcard_h_addr"];
	 $this->vcard_h_city=$arData["vcard_h_city"];
	 $this->vcard_h_coun=$arData["vcard_h_coun"];
	 $this->vcard_h_fax =$arData["vcard_h_fax"];
	 $this->vcard_h_mail=$arData["vcard_h_mail"];
	 $this->vcard_h_phon=$arData["vcard_h_phon"];
	 $this->vcard_h_zip =$arData["vcard_h_zip"];
     $this->vcard_h_uri =$arData["vcard_h_uri"];

	 $this->vcard_w_addr=$arData["vcard_w_addr"];
	 $this->vcard_w_city=$arData["vcard_w_city"];
	 $this->vcard_w_coun=$arData["vcard_w_coun"];
	 $this->vcard_w_fax =$arData["vcard_w_fax"];
	 $this->vcard_w_mail=$arData["vcard_w_mail"];
	 $this->vcard_w_phon=$arData["vcard_w_phon"];
	 $this->vcard_w_role=$arData["vcard_w_role"];
	 $this->vcard_w_titl=$arData["vcard_w_titl"];
	 $this->vcard_w_zip =$arData["vcard_w_zip"];
     $this->vcard_w_uri =$arData["vcard_w_uri"];

    }//end if is_array

   }//end of Conrtuct

   function createVcard() {


    //Vcard Time Zone
    $vcard_tz = date("O");

    //Vcard Rev
    $vcard_rev = date("Y-m-d");

    // Start Vcard Scritp
	$this->vcard = "BEGIN:VCARD\r\n";
	$this->vcard .= "VERSION:3.0\r\n";
	$this->vcard .= "CLASS:PUBLIC\r\n";
	$this->vcard .= "PRODID:-//IFLashLord.com [Behrouz Pooladrag]//VcardIFL Version 0.0.1//IR\r\n";
	$this->vcard .= "REV:" . $vcard_rev . "\r\n";
	$this->vcard .= "TZ:" . $vcard_tz . "\r\n";

    //vcard_f_name
	if ($this->vcard_f_name != ""){
		if ($this->vcard_s_name != ""){
			$this->vcard .= "FN:" . $this->vcard_s_name . " " . $this->vcard_f_name . "\r\n";
			$this->vcard .= "N:" . $this->vcard_f_name . "," . $this->vcard_s_name . "\r\n";
		}
		else {
			$this->vcard .= "FN:" . $this->vcard_f_name . "\r\n";
			$this->vcard .= "N:" . $this->vcard_f_name . "\r\n";
		}
	}else if ($this->vcard_s_name != ""){
		$this->vcard .= "FN:" . $this->vcard_s_name . "\r\n";
		$this->vcard .= "N:" . $this->vcard_s_name . "\r\n";
	}

    // vcard_nickna
	if ($this->vcard_nickna != ""){
		$this->vcard .= "NICKNAME:" . $this->vcard_nickna . "\r\n";
	}

   // vcard_compan
	if ($this->vcard_compan != ""){
		$this->vcard .= "ORG:" . $this->vcard_compan . "\r\n";
		$this->vcard .= "SORTSTRING:" . $this->vcard_compan . "\r\n";
	}
	elseif ($this->vcard_f_name != ""){
		$this->vcard .= "SORTSTRING:" . $this->vcard_f_name . "\r\n";
	}


   // vcard_birtda
	if ($this->vcard_birtda != ""){
		$this->vcard .= "BDAY:" . $this->vcard_birtda . "\r\n";
	}

   // vcard_w_role
	if ($this->vcard_w_role != ""){
		$this->vcard .= "ROLE:" . $this->vcard_w_role . "\r\n";
	}

   // vcard_w_titl
	if ($this->vcard_w_titl != ""){
		$this->vcard .= "TITLE:" . $this->vcard_w_titl . "\r\n";
	}

   // vcard_note
	if ($this->vcard_note != ""){
		$this->vcard .= "NOTE:" . $this->vcard_note . "\r\n";
	}

   // vcard_w_mail
	if ($this->vcard_w_mail != ""){
		$this->vcard .= "EMAIL;TYPE=INTERNET,PREF:" . $this->vcard_w_mail . "\r\n";
		if ($this->vcard_h_mail != ""){
			$this->vcard .= "EMAIL;TYPE=INTERNET:" . $this->vcard_h_mail . "\r\n";
		}
	}
	elseif ($this->vcard_h_mail != ""){
		$this->vcard .= "EMAIL;TYPE=INTERNET,PREF:" . $this->vcard_h_mail . "\r\n";
	}

    // vcard_cellul
	if ($this->vcard_cellul != ""){
		$this->vcard .= "TEL;TYPE=VOICE,CELL:" . $this->vcard_cellul . "\r\n";
	}

   // vcard_h_fax
	if ($this->vcard_h_fax != ""){
		$this->vcard .= "TEL;TYPE=FAX,HOME:" . $this->vcard_h_fax . "\r\n";
	}

   // vcard_w_fax
	if ($this->vcard_w_fax != ""){
		$this->vcard .= "TEL;TYPE=FAX,WORK:" . $this->vcard_w_fax . "\r\n";
	}

   // vcard_h_phon
	if ($this->vcard_h_phon != ""){
		$this->vcard .= "TEL;TYPE=VOICE,HOME:" . $this->vcard_h_phon . "\r\n";
	}

   // vcard_w_phon
	if ($this->vcard_w_phon != ""){
                $this->vcard .= "TEL;TYPE=VOICE,WORK:" . $this->vcard_w_phon . "\r\n";
 	}

	// vcard_p_pager
	if ($this->vcard_p_pager != ""){
                $this->vcard .= "TEL;TYPE=PAGER,VOICE:" . $this->vcard_p_pager . "\r\n";
 	}

   // vcard_uri
	if ($this->vcard_uri != ""){
		$this->vcard .= "URL:" . $this->vcard_uri . "\r\n";
	}



	// vcard_h_uri
	if ($this->vcard_h_uri != ""){
		$this->vcard .= "URL;HOME:" . $this->vcard_h_uri . "\r\n";
	}

    // vcard_w_uri
	if ($this->vcard_w_uri != ""){
		$this->vcard .= "URL;WORK:" . $this->vcard_w_uri . "\r\n";
	}

   // vcard_h_addr
	if ($this->vcard_h_addr != ""){
		$this->vcard_addr = ";;" . $this->vcard_h_addr;
		$this->vcard_labl = $this->vcard_h_addr;
	}


   // vcard_h_city
	if ($this->vcard_h_city != ""){
		if ($this->vcard_addr != ""){
			$this->vcard_addr .= ";" . $this->vcard_h_city;
		}
		else{
			$this->vcard_addr .= ";;;" . $this->vcard_h_city;
		}
		if ($this->vcard_labl != ""){
			$this->vcard_labl .= "\\r\\n" . $this->vcard_h_city;
		}
		else {
			$this->vcard_labl = $this->vcard_h_city;
		}
	}


    // vcard_h_zip
	if ($this->vcard_h_zip != ""){
		if ($this->vcard_addr != ""){
                        $this->vcard_addr .= ";" . $this->vcard_h_zip;
                }
                else{
                        $this->vcard_addr .= ";;;;" . $this->vcard_h_zip;
                }
                if ($this->vcard_labl != ""){
                        $this->vcard_labl .= "\\r\\n" . $this->vcard_h_zip;
                }
                else {
                        $this->vcard_labl = $this->vcard_h_zip;
                }
	}

   // vcard_h_coun
	if ($this->vcard_h_coun != ""){
                if ($this->vcard_addr != ""){
                        $this->vcard_addr .= ";" . $this->vcard_h_coun;
                }
                else{
                        $this->vcard_addr .= ";;;;;" . $this->vcard_h_coun;
                }
                if ($this->vcard_labl != ""){
                        $this->vcard_labl .= "\\r\\n" . $this->vcard_h_coun;
                }
                else {
                        $this->vcard_labl = $this->vcard_h_coun;
                }
 	}

   // vcard_addr
	if ($this->vcard_addr != ""){
		$this->vcard .= "ADR;TYPE=HOME,POSTAL,PARCEL:" . $this->vcard_addr . "\r\n";
	}

   // vcard_labl
	if ($this->vcard_labl != ""){
		$this->vcard .= "LABEL;TYPE=DOM,HOME,POSTAL,PARCEL:" . $this->vcard_labl . "\r\n";
	}



	$this->vcard_addr = "";
	$this->vcard_labl = "";

	// vcard_w_addr
	if ($this->vcard_w_addr != ""){
                $this->vcard_addr = ";;" . $this->vcard_w_addr;
                $this->vcard_labl = $this->vcard_w_addr;
 	}

    // vcard_w_city
	if ($this->vcard_w_city != ""){

                if ($this->vcard_addr != ""){
                        $this->vcard_addr .= ";" . $this->vcard_w_city;
                }else{
                        $this->vcard_addr .= ";;;" . $this->vcard_w_city;
                }

                if ($this->vcard_labl != ""){
                        $this->vcard_labl .= "\\r\\n" . $this->vcard_w_city;
                }else{
                        $this->vcard_labl = $this->vcard_w_city;
                }

 	}

     // vcard_w_zip
	if ($this->vcard_w_zip != ""){

                if ($this->vcard_addr != ""){
                        $this->vcard_addr .= ";" . $this->vcard_w_zip;
                }else{
                        $this->vcard_addr .= ";;;;" . $this->vcard_w_zip;
                }

                if ($this->vcard_labl != ""){
                        $this->vcard_labl .= "\\r\\n" . $this->vcard_w_zip;
                }else {
                        $this->vcard_labl = $this->vcard_w_zip;
                }

 	}

   // vcard_w_coun
	if ($this->vcard_w_coun != ""){

                if ($this->vcard_addr != ""){
                        $this->vcard_addr .= ";" . $this->vcard_w_coun;
                }else{
                        $this->vcard_addr .= ";;;;;" . $this->vcard_w_coun;
                }

                if ($this->vcard_labl != ""){
                        $this->vcard_labl .= "\\r\\n" . $this->vcard_w_coun;
                } else {
                        $this->vcard_labl = $this->vcard_w_coun;
                }

 	}

   // vcard_addr
	if ($this->vcard_addr != ""){
                $this->vcard .= "ADR;TYPE=WORK,POSTAL,PARCEL:" . $this->vcard_addr . "\r\n";
    }

   // vcard_labl
	if ($this->vcard_labl != ""){
                $this->vcard .= "LABEL;TYPE=DOM,WORK,POSTAL,PARCEL:" . $this->vcard_labl . "\r\n";
 	}


    // End of Script Vcard
	$this->vcard .= "END:VCARD\n";


    // Set Vcard to Private Vcard
    //$this->vcard=$vcard;

   }//end of constract

   // Save Vcard in Host
   public function SaveVcard ($randName=false) {
   if($randName) {
    $this->fileName=$this->fileName.uniqid(MD5(Rand(0000000,9999999)));
   }
   	$handel=@fopen($this->saveTo."/".$this->fileName.".vcf","w");
    $write=@fwrite($handel,$this->vcard,strlen($this->vcard));
    @fclose($handel);
   return $write ? true : false;
   }//end of function

   // Download Vcard
   public function DownloadVcard () {
    header("Content-type: text/directory");
	header("Content-Disposition: attachment; filename=".$this->fileName.".vcf"."");
	header("Pragma: public");
	print $this->vcard;
   }//end of function


}//end class VcardIFL
?>