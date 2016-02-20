<?
namespace Kladr;

/**
 * ������ �����
 * @property-read string          $Id          ������������� �������
 * @property-read string          $Name        �������� �������
 * @property-read string          $Zip         �������� ������ �������
 * @property-read string          $Type        ��� ������� ��������� (�������, �����)
 * @property-read string          $TypeShort   ��� ������� ������� (���, �-�)
 * @property-read string          $ContentType ��� ������� �� ������������ ObjectType
 * @property-read string          $Okato       ����� �������
 * @property-read \Kladr\Object[] $Parents     ������ ������������ ��������
 */
class Object
{
	private $id;
	private $name;
	private $zip;
	private $type;
	private $typeShort;
	private $okato;
	private $contentType;
	private $arParents;

	/**
	 * @param $obObject
	 */
	public function __construct($obObject)
	{
		$this->id          = $obObject->id;
		$this->name        = $obObject->name;
		$this->zip         = $obObject->zip;
		$this->type        = $obObject->type;
		$this->typeShort   = $obObject->typeShort;
		$this->okato       = $obObject->okato;
		$this->contentType = $obObject->contentType;

		$this->arParents = array();

		if (isset($obObject->parents)) {
			foreach ($obObject->parents as $obParent) {
				$this->arParents[] = new Object($obParent);
			}
		}
	}

	public function __get($name)
	{
		switch ($name) {
			case 'Id':
				return $this->id;
			case 'Name':
				return $this->name;
			case 'Zip':
				return $this->zip;
			case 'Type':
				return $this->type;
			case 'TypeShort':
				return $this->typeShort;
			case 'Okato':
				return $this->okato;
			case 'ContentType':
				return $this->contentType;
			case 'Parents':
				return $this->arParents;
		}
	}
}