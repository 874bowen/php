<?php
date_default_timezone_set('Africa/Nairobi');

$nextWeek = time()+(7*24*60*60);
echo 'Now:     	  '.date('Y-m-d');
echo "<br>";
echo 'Next week:  '.date('Y-m-d', $nextWeek);
echo "<br>";

echo '==========================================';
echo "<br>";

$now = new DateTime();
$nextWeek = new DateTime('today + 1 week');
echo 'Now         '.$now -> format('Y-m-d');
echo "<br>";
echo 'Next Week   '.$nextWeek -> format('Y-m-d');
echo "<br>";



/**
 * 
 */
class person
{
	public $fullname = false;
	public $givenname = false;
	public $familyname = false;
	public $room = false;

	function get_name(){
		if($this->fullname !== false) return $this->fullname;
		if ($this->familyname !== false && $this->givenname !== false) {
			return $this->givenname . ' ' . $this->familyname;
		}
		return false;
	}
}
$chuck = new Person();
$chuck->fullname = "Chuck Severence";
$chuck->room  = "4429NQ";

$colleen = new Person();
$colleen->familyname = "van Lent";
$colleen->givenname = "Colleen";
$colleen->room  = "3439NQ";

print $chuck->get_name();
echo "<br>";
print $colleen->get_name();
echo "<br>";

/**
 * 
 */

?>