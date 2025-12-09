<?php

namespace Hubleto\App\Custom\IpInfoTest\Models;

use \Hubleto\Framework\Db\Column\Boolean;
use \Hubleto\Framework\Db\Column\Color;
use \Hubleto\Framework\Db\Column\Decimal;
use \Hubleto\Framework\Db\Column\Date;
use \Hubleto\Framework\Db\Column\DateTime;
use \Hubleto\Framework\Db\Column\File;
use \Hubleto\Framework\Db\Column\Image;
use \Hubleto\Framework\Db\Column\Integer;
use \Hubleto\Framework\Db\Column\Json;
use \Hubleto\Framework\Db\Column\Lookup;
use \Hubleto\Framework\Db\Column\Password;
use \Hubleto\Framework\Db\Column\Text;
use \Hubleto\Framework\Db\Column\Varchar;

use \Hubleto\App\Community\Auth\Models\User;

class FavoriteIP extends \Hubleto\Framework\Model
{

  // Enum constants for improving readability of the code
  const ENUM_ONE = 1;
  const ENUM_TWO = 2;
  const ENUM_THREE = 3;

  // Enum lists to be used for columns with enumerable lists.
  // For more details see https://developer.hubleto.com/v0/docs/models/enums
  const INTEGER_ENUM_VALUES = [
    self::ENUM_ONE => 'One',
    self::ENUM_TWO => 'Two',
    self::ENUM_THREE => 'Three',
  ];

  // Name of the SQL table for this model
  public string $table = 'favoriteips';

  // Model's record manager class.
  // For more details see https://developer.hubleto.com/v0/docs/models/record-manager
  public string $recordManagerClass = RecordManagers\FavoriteIP::class;

  public ?string $lookupSqlValue = 'concat("FavoriteIP #", {%TABLE%}.id)';
  public ?string $lookupUrlDetail = 'favorite-i-ps/{%ID%}';

  // Definition of model's relations.
  // For more details see https://developer.hubleto.com/v0/docs/models/relations
  public array $relations = [ 
    'OWNER' => [ self::BELONGS_TO, User::class, 'id_owner', 'id' ],
    'MANAGER' => [ self::BELONGS_TO, User::class, 'id_manager', 'id' ],
  ];

  /**
   * Returns description of the columns in this model.
   * For more details see https://developer.hubleto.com/v0/docs/models/description-api
   *
   * @return array
   * 
   */
  public function describeColumns(): array
  {
    return array_merge(parent::describeColumns(), [
      'ip' => (new Varchar($this, $this->translate('IP Address')))->setDefaultVisible()
        ->setRequired()
        ->setCssClass('text-2xl text-primary')
      ,
      'continent' => (new Varchar($this, $this->translate('Continent')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'country' => (new Varchar($this, $this->translate('Country')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'regionName' => (new Varchar($this, $this->translate('Region Name')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'city' => (new Varchar($this, $this->translate('City')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'zip' => (new Varchar($this, $this->translate('Postal Code')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'lat' => (new Varchar($this, $this->translate('Latitude')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'lon' => (new Varchar($this, $this->translate('Longitude')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'timezone' => (new Varchar($this, $this->translate('Timezone')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'currency' => (new Varchar($this, $this->translate('Currency')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'isp' => (new Varchar($this, $this->translate('Internet Service Provider')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'org' => (new Varchar($this, $this->translate('Organization')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'as' => (new Varchar($this, $this->translate('AS')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
      ,
      'reverse' => (new Varchar($this, $this->translate('Reverse DNS')))->setDefaultVisible()
        ->setCssClass('text-2xl text-primary')
    ]);
  }

  /**
   * Returns description of the table showing data from this model.
   * For more details see https://developer.hubleto.com/v0/docs/models/description-api
   *
   * @return \Hubleto\Framework\Description\Table
   * 
   */
  public function describeTable(): \Hubleto\Framework\Description\Table
  {
    $description = parent::describeTable();
    $description->ui['addButtonText'] = 'Add FavoriteIP';
    $description->show(['header', 'fulltextSearch', 'columnSearch', 'moreActionsButton']);
    $description->hide(['footer']);

    // Uncomment and modify these lines if you want to define table filter for your model
    // $description->ui['filters'] = [
    //   'fArchive' => [ 'title' => 'Archive', 'options' => [ 0 => 'Active', 1 => 'Archived' ] ],
    // ];

    return $description;
  }

  /**
   * Returns description of the form showing a data in a record of this model.
   * For more details see https://developer.hubleto.com/v0/docs/models/description-api
   *
   * @return \Hubleto\Framework\Description\Table
   * 
   */
  // public function describeForm(): \Hubleto\Framework\Description\Form
  // {
  //   return parent::describeForm();
  // }

  /**
   * Callback called before the record is created.
   * For more details see https://developer.hubleto.com/v0/docs/models/callbacks
   *
   * @param array $record
   * 
   * @return array
   * 
   */
  // public function onBeforeCreate(array $record): array
  // {
  //   return parent::onBeforeCreate($record);
  // }

  /**
   * Callback called after the record is created.
   * For more details see https://developer.hubleto.com/v0/docs/models/callbacks
   *
   * @param array $record
   * 
   * @return array
   * 
   */
  // public function onAfterCreate(array $savedRecord): array
  // {
  //   return parent::onAfterCreate($savedRecord);
  // }

  /**
   * Callback called before the record is updated.
   * For more details see https://developer.hubleto.com/v0/docs/models/callbacks
   *
   * @param array $record
   * 
   * @return array
   * 
   */
  // public function onBeforeUpdate(array $record): array
  // {
  //   return parent::onBeforeUpdate($record);
  // }

  /**
   * Callback called after the record is updated.
   * For more details see https://developer.hubleto.com/v0/docs/models/callbacks
   *
   * @param array $record
   * 
   * @return array
   * 
   */
  // public function onAfterUpdate(array $originalRecord, array $savedRecord): array
  // {
  //   return parent::onAfterUpdate($originalRecord, $savedRecord);
  // }

}
