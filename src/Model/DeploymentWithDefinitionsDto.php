<?php
/**
 * DeploymentWithDefinitionsDto
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  StrehleDe\CamundaClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Camunda BPM REST API
 *
 * OpenApi Spec for Camunda BPM REST API.
 *
 * The version of the OpenAPI document: 7.13.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace StrehleDe\CamundaClient\Model;

use \ArrayAccess;
use \StrehleDe\CamundaClient\ObjectSerializer;

/**
 * DeploymentWithDefinitionsDto Class Doc Comment
 *
 * @category Class
 * @package  StrehleDe\CamundaClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DeploymentWithDefinitionsDto implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DeploymentWithDefinitionsDto';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'deployed_process_definitions' => 'map[string,\StrehleDe\CamundaClient\Model\ProcessDefinitionDto]',
        'deployed_decision_definitions' => 'map[string,\StrehleDe\CamundaClient\Model\DecisionDefinitionDto]',
        'deployed_decision_requirements_definitions' => 'map[string,\StrehleDe\CamundaClient\Model\DecisionRequirementsDefinitionDto]',
        'deployed_case_definitions' => 'map[string,\StrehleDe\CamundaClient\Model\CaseDefinitionDto]',
        'id' => 'string',
        'tenant_id' => 'string',
        'deployment_time' => '\DateTime',
        'source' => 'string',
        'name' => 'string',
        'links' => '\StrehleDe\CamundaClient\Model\AtomLink[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'deployed_process_definitions' => null,
        'deployed_decision_definitions' => null,
        'deployed_decision_requirements_definitions' => null,
        'deployed_case_definitions' => null,
        'id' => null,
        'tenant_id' => null,
        'deployment_time' => 'date-time',
        'source' => null,
        'name' => null,
        'links' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'deployed_process_definitions' => 'deployedProcessDefinitions',
        'deployed_decision_definitions' => 'deployedDecisionDefinitions',
        'deployed_decision_requirements_definitions' => 'deployedDecisionRequirementsDefinitions',
        'deployed_case_definitions' => 'deployedCaseDefinitions',
        'id' => 'id',
        'tenant_id' => 'tenantId',
        'deployment_time' => 'deploymentTime',
        'source' => 'source',
        'name' => 'name',
        'links' => 'links'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'deployed_process_definitions' => 'setDeployedProcessDefinitions',
        'deployed_decision_definitions' => 'setDeployedDecisionDefinitions',
        'deployed_decision_requirements_definitions' => 'setDeployedDecisionRequirementsDefinitions',
        'deployed_case_definitions' => 'setDeployedCaseDefinitions',
        'id' => 'setId',
        'tenant_id' => 'setTenantId',
        'deployment_time' => 'setDeploymentTime',
        'source' => 'setSource',
        'name' => 'setName',
        'links' => 'setLinks'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'deployed_process_definitions' => 'getDeployedProcessDefinitions',
        'deployed_decision_definitions' => 'getDeployedDecisionDefinitions',
        'deployed_decision_requirements_definitions' => 'getDeployedDecisionRequirementsDefinitions',
        'deployed_case_definitions' => 'getDeployedCaseDefinitions',
        'id' => 'getId',
        'tenant_id' => 'getTenantId',
        'deployment_time' => 'getDeploymentTime',
        'source' => 'getSource',
        'name' => 'getName',
        'links' => 'getLinks'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['deployed_process_definitions'] = isset($data['deployed_process_definitions']) ? $data['deployed_process_definitions'] : null;
        $this->container['deployed_decision_definitions'] = isset($data['deployed_decision_definitions']) ? $data['deployed_decision_definitions'] : null;
        $this->container['deployed_decision_requirements_definitions'] = isset($data['deployed_decision_requirements_definitions']) ? $data['deployed_decision_requirements_definitions'] : null;
        $this->container['deployed_case_definitions'] = isset($data['deployed_case_definitions']) ? $data['deployed_case_definitions'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['tenant_id'] = isset($data['tenant_id']) ? $data['tenant_id'] : null;
        $this->container['deployment_time'] = isset($data['deployment_time']) ? $data['deployment_time'] : null;
        $this->container['source'] = isset($data['source']) ? $data['source'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['links'] = isset($data['links']) ? $data['links'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets deployed_process_definitions
     *
     * @return map[string,\StrehleDe\CamundaClient\Model\ProcessDefinitionDto]|null
     */
    public function getDeployedProcessDefinitions()
    {
        return $this->container['deployed_process_definitions'];
    }

    /**
     * Sets deployed_process_definitions
     *
     * @param map[string,\StrehleDe\CamundaClient\Model\ProcessDefinitionDto]|null $deployed_process_definitions A JSON Object containing a property for each of the process definitions, which are successfully deployed with that deployment. The key is the process definition id, the value is a JSON Object corresponding to the process definition.
     *
     * @return $this
     */
    public function setDeployedProcessDefinitions($deployed_process_definitions)
    {
        $this->container['deployed_process_definitions'] = $deployed_process_definitions;

        return $this;
    }

    /**
     * Gets deployed_decision_definitions
     *
     * @return map[string,\StrehleDe\CamundaClient\Model\DecisionDefinitionDto]|null
     */
    public function getDeployedDecisionDefinitions()
    {
        return $this->container['deployed_decision_definitions'];
    }

    /**
     * Sets deployed_decision_definitions
     *
     * @param map[string,\StrehleDe\CamundaClient\Model\DecisionDefinitionDto]|null $deployed_decision_definitions A JSON Object containing a property for each of the decision definitions, which are successfully deployed with that deployment. The key is the decision definition id, the value is a JSON Object corresponding to the decision definition.
     *
     * @return $this
     */
    public function setDeployedDecisionDefinitions($deployed_decision_definitions)
    {
        $this->container['deployed_decision_definitions'] = $deployed_decision_definitions;

        return $this;
    }

    /**
     * Gets deployed_decision_requirements_definitions
     *
     * @return map[string,\StrehleDe\CamundaClient\Model\DecisionRequirementsDefinitionDto]|null
     */
    public function getDeployedDecisionRequirementsDefinitions()
    {
        return $this->container['deployed_decision_requirements_definitions'];
    }

    /**
     * Sets deployed_decision_requirements_definitions
     *
     * @param map[string,\StrehleDe\CamundaClient\Model\DecisionRequirementsDefinitionDto]|null $deployed_decision_requirements_definitions A JSON Object containing a property for each of the decision requirements definitions, which are successfully deployed with that deployment. The key is the decision requirements definition id, the value is a JSON Object corresponding to the decision requirements definition.
     *
     * @return $this
     */
    public function setDeployedDecisionRequirementsDefinitions($deployed_decision_requirements_definitions)
    {
        $this->container['deployed_decision_requirements_definitions'] = $deployed_decision_requirements_definitions;

        return $this;
    }

    /**
     * Gets deployed_case_definitions
     *
     * @return map[string,\StrehleDe\CamundaClient\Model\CaseDefinitionDto]|null
     */
    public function getDeployedCaseDefinitions()
    {
        return $this->container['deployed_case_definitions'];
    }

    /**
     * Sets deployed_case_definitions
     *
     * @param map[string,\StrehleDe\CamundaClient\Model\CaseDefinitionDto]|null $deployed_case_definitions A JSON Object containing a property for each of the case definitions, which are successfully deployed with that deployment. The key is the case definition id, the value is a JSON Object corresponding to the case definition.
     *
     * @return $this
     */
    public function setDeployedCaseDefinitions($deployed_case_definitions)
    {
        $this->container['deployed_case_definitions'] = $deployed_case_definitions;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id The id of the deployment.
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets tenant_id
     *
     * @return string|null
     */
    public function getTenantId()
    {
        return $this->container['tenant_id'];
    }

    /**
     * Sets tenant_id
     *
     * @param string|null $tenant_id The tenant id of the deployment.
     *
     * @return $this
     */
    public function setTenantId($tenant_id)
    {
        $this->container['tenant_id'] = $tenant_id;

        return $this;
    }

    /**
     * Gets deployment_time
     *
     * @return \DateTime|null
     */
    public function getDeploymentTime()
    {
        return $this->container['deployment_time'];
    }

    /**
     * Sets deployment_time
     *
     * @param \DateTime|null $deployment_time The time when the deployment was created.
     *
     * @return $this
     */
    public function setDeploymentTime($deployment_time)
    {
        $this->container['deployment_time'] = $deployment_time;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string|null $source The source of the deployment.
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name The name of the deployment.
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets links
     *
     * @return \StrehleDe\CamundaClient\Model\AtomLink[]|null
     */
    public function getLinks()
    {
        return $this->container['links'];
    }

    /**
     * Sets links
     *
     * @param \StrehleDe\CamundaClient\Model\AtomLink[]|null $links The links associated to this resource, with `method`, `href` and `rel`.
     *
     * @return $this
     */
    public function setLinks($links)
    {
        $this->container['links'] = $links;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


