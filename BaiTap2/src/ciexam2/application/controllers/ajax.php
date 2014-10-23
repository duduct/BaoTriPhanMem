<?php
class Ajax extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function ajax_level2($id)
	{
		$xmlDoc=new DOMDocument();
		$xmlDoc->load("data.xml");


			$x=$xmlDoc->getElementsByTagName('link');

			//get the q parameter from URL

			//lookup all links from the xml file if length of q>0
			if (strlen($id)>0)
			{
			$hint="";
			for($i=0; $i<($x->length); $i++)
			  {
			  $y=$x->item($i)->getElementsByTagName('title');
			  if ($y->item(0)->nodeType==1)
			    {
			    //find a link matching the search text
			    if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$id))
			      {
			      if ($hint=="")
			        {
			        $hint="<a>". 
			        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
			        }
			      else
			        {
			        $hint=$hint . "<br /><a>" . 
			        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
			        }
			      }
			    }
			  }
			}

			// Set output to "no suggestion" if no hint were found
			// or to the correct values
			if ($hint=="")
			  {
			  $response="no suggestion";
			  }
			else
			  {
			  $response=$hint;
			  }

			//output the response
			echo $response;



		/*$a[]="Anna";
		$a[]="Brittany";
		$a[]="Cinderella";
		$a[]="Diana";
		$a[]="Eva";
		$a[]="Fiona";
		$a[]="Gunda";
		$a[]="Hege";
		$a[]="Inga";
		$a[]="Johanna";
		$a[]="Kitty";
		$a[]="Linda";
		$a[]="Nina";
		$a[]="Ophelia";
		$a[]="Petunia";
		$a[]="Amanda";
		$a[]="Raquel";
		$a[]="Cindy";
		$a[]="Doris";
		$a[]="Eve";
		$a[]="Evita";
		$a[]="Sunniva";
		$a[]="Tove";
		$a[]="Unni";
		$a[]="Violet";
		$a[]="Liza";
		$a[]="Elizabeth";
		$a[]="Ellen";
		$a[]="Wenche";
		$a[]="Vicky";

		//get the q parameter from URL

		//lookup all hints from array if length of q>0
		if (strlen($id) > 0)
		  {
		  $hint="";
		  for($i=0; $i<count($a); $i++)
		    {
		    if (strtolower($id)==strtolower(substr($a[$i],0,strlen($id))))
		      {
		      if ($hint=="")
		        {
		        $hint=$a[$i];
		        }
		      else
		        {
		        $hint=$hint." , ".$a[$i];
		        }
		      }
		    }
		  }

		// Set output to "no suggestion" if no hint were found
		// or to the correct values
		if ($hint == "")
		  {
		  $response="no suggestion";
		  }
		else
		  {
		  $response=$hint;
		  }

		//output the response
		echo $response;*/
		?>
	<!--<select name="level2" size="1">
	<option value="" selected >Level 2</option>
    <?php
	$iduery=$this->db->query("select * from level2 where id_level1='".$id."'");
	if($iduery->num_rows()!=0)
	{
	$data=$iduery->result_array();
	foreach($data as $items)
		{
		?>
        <option value='<?=$items["id"]?>' ><?=$items["name"]?></option>
        <?php
		}
	}
	?>
    </select>-->

    	<?php
	}
}
?>