<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   ZendGData
 */

namespace ZendGData\Spreadsheets;

use ZendGData\App;

/**
 * Assists in constructing queries for Google Spreadsheets lists
 *
 * @link http://code.google.com/apis/gdata/calendar/
 *
 * @category   Zend
 * @package    ZendGData
 * @subpackage Spreadsheets
 */
class ListQuery extends \ZendGData\Query
{

    const SPREADSHEETS_LIST_FEED_URI = 'https://spreadsheets.google.com/feeds/list';

    protected $_defaultFeedUri = self::SPREADSHEETS_LIST_FEED_URI;
    protected $_visibility = 'private';
    protected $_projection = 'full';
    protected $_spreadsheetKey = null;
    protected $_worksheetId = 'default';
    protected $_rowId = null;

    /**
     * Constructs a new ZendGData\Spreadsheets\ListQuery object.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Sets the spreadsheet key for the query.
     * @param string $value
     * @return \ZendGData\Spreadsheets\CellQuery Provides a fluent interface
     */
    public function setSpreadsheetKey($value)
    {
        $this->_spreadsheetKey = $value;
        return $this;
    }

    /**
     * Gets the spreadsheet key for the query.
     * @return string spreadsheet key
     */
    public function getSpreadsheetKey()
    {
        return $this->_spreadsheetKey;
    }

    /**
     * Sets the worksheet id for the query.
     * @param string $value
     * @return \ZendGData\Spreadsheets\CellQuery Provides a fluent interface
     */
    public function setWorksheetId($value)
    {
        $this->_worksheetId = $value;
        return $this;
    }

    /**
     * Gets the worksheet id for the query.
     * @return string worksheet id
     */
    public function getWorksheetId()
    {
        return $this->_worksheetId;
    }

    /**
     * Sets the row id for the query.
     * @param string $value row id
     * @return \ZendGData\Spreadsheets\CellQuery Provides a fluent interface
     */
    public function setRowId($value)
    {
        $this->_rowId = $value;
        return $this;
    }

    /**
     * Gets the row id for the query.
     * @return string row id
     */
    public function getRowId()
    {
        return $this->_rowId;
    }

    /**
     * Sets the projection for the query.
     * @param string $value Projection
     * @return \ZendGData\Spreadsheets\ListQuery Provides a fluent interface
     */
    public function setProjection($value)
    {
        $this->_projection = $value;
        return $this;
    }

    /**
     * Sets the visibility for this query.
     * @param string $value visibility
     * @return \ZendGData\Spreadsheets\ListQuery Provides a fluent interface
     */
    public function setVisibility($value)
    {
        $this->_visibility = $value;
        return $this;
    }

    /**
     * Gets the projection for this query.
     * @return string projection
     */
    public function getProjection()
    {
        return $this->_projection;
    }

    /**
     * Gets the visibility for this query.
     * @return string visibility
     */
    public function getVisibility()
    {
        return $this->_visibility;
    }

    /**
     * Sets the spreadsheet key for this query.
     * @param string $value
     * @return \ZendGData\Spreadsheets\DocumentQuery Provides a fluent interface
     */
    public function setSpreadsheetQuery($value)
    {
        if ($value != null) {
            $this->_params['sq'] = $value;
        } else {
            unset($this->_params['sq']);
        }
        return $this;
    }

    /**
     * Gets the spreadsheet key for this query.
     * @return string spreadsheet query
     */
    public function getSpreadsheetQuery()
    {
        if (array_key_exists('sq', $this->_params)) {
            return $this->_params['sq'];
        } else {
            return null;
        }
    }

    /**
     * Sets the orderby attribute for this query.
     * @param string $value
     * @return \ZendGData\Spreadsheets\DocumentQuery Provides a fluent interface
     */
    public function setOrderBy($value)
    {
        if ($value != null) {
            $this->_params['orderby'] = $value;
        } else {
            unset($this->_params['orderby']);
        }
        return $this;
    }

    /**
     * Gets the orderby attribute for this query.
     * @return string orderby
     */
    public function getOrderBy()
    {
        if (array_key_exists('orderby', $this->_params)) {
            return $this->_params['orderby'];
        } else {
            return null;
        }
    }

    /**
     * Sets the reverse attribute for this query.
     * @param string $value
     * @return \ZendGData\Spreadsheets\DocumentQuery Provides a fluent interface
     */
    public function setReverse($value)
    {
        if ($value != null) {
            $this->_params['reverse'] = $value;
        } else {
            unset($this->_params['reverse']);
        }
        return $this;
    }

    /**
     * Gets the reverse attribute for this query.
     * @return string reverse
     */
    public function getReverse()
    {


        if (array_key_exists('reverse', $this->_params)) {
            return $this->_params['reverse'];
        } else {
            return null;
        }
    }

    /**
     * Sets the max-results attribute for this query.
     *
     * @param string $value
     * @return Zend_Gdata_Spreadsheets_ListQuery Provides a fluent interface
     */
    public function setMaxResults($value)
    {
        if ($value !== NULL) {
            $this->_params['max-results'] = $value;
        } else {
            unset($this->_params['max-results']);
        }
        return $this;
    }

    /**
     * Gets the max-results attribute for this query.
     *
     * @return string max-results
     */
    public function getMaxResults()
    {
        if (array_key_exists('max-results', $this->_params)) {
            return $this->_params['max-results'];
        } else {
            return null;
        }
    }
 
    /**
     * Gets the full query URL for this query.
     * @return string url
     */
    public function getQueryUrl()
    {

        $uri = $this->_defaultFeedUri;

        if ($this->_spreadsheetKey != null) {
            $uri .= '/'.$this->_spreadsheetKey;
        } else {
            throw new App\Exception('A spreadsheet key must be provided for list queries.');
        }

        if ($this->_worksheetId != null) {
            $uri .= '/'.$this->_worksheetId;
        } else {
            throw new App\Exception('A worksheet id must be provided for list queries.');
        }

        if ($this->_visibility != null) {
            $uri .= '/'.$this->_visibility;
        } else {
            throw new App\Exception('A visibility must be provided for list queries.');
        }

        if ($this->_projection != null) {
            $uri .= '/'.$this->_projection;
        } else {
            throw new App\Exception('A projection must be provided for list queries.');
        }

        if ($this->_rowId != null) {
            $uri .= '/'.$this->_rowId;
        }

        $uri .= $this->getQueryString();
        return $uri;
    }

    /**
     * Gets the attribute query string for this query.
     * @return string query string
     */
    public function getQueryString()
    {
        return parent::getQueryString();
    }

}
