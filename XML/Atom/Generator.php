<?php

require_once 'XML/Atom/Element.php';

/**
 * A class used to generate a generator node.
 *
 * @package   XML_Atom
 * @copyright 2008-2017 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 * @link      https://github.com/silverorange/xml-atom
 */
class XML_Atom_Generator extends XML_Atom_Element
{
    // {{{ protected properties

    /**
     * The genetator of this node
     *
     * @var string
     */
    protected $generator = '';

    /**
     * The URI of this node
     *
     * @var string
     */
    protected $uri = '';

    /**
     * The version of this node
     *
     * @var string
     */
    protected $version = '';

    // }}}
    // {{{ public function __construct()

    /**
     * Contruct this XML_Atom_Generator
     *
     * @param string $generator the generator to use.
     * @param string $uri       the URI to use.
     * @param string $version   the version to use.
     */
    public function __construct($generator, $uri = '', $version = '')
    {
        $this->setGenerator($generator);
        $this->setUri($uri);
        $this->setVersion($version);
    }

    // }}}
    // {{{ public function setGenerator()

    /**
     * Sets the generator of this node.
     *
     * @param string $generator the generator to set this node to.
     *
     * @return void
     */
    public function setGenerator($generator)
    {
        $this->generator = strval($generator);
    }

    // }}}
    // {{{ public function setUri()

    /**
     * Sets the URI of this node.
     *
     * @param string $uri the URI to set this node to.
     *
     * @return void
     */
    public function setUri($uri)
    {
        $this->uri = strval($uri);
    }

    // }}}
    // {{{ public function setVersion()

    /**
     * Sets the version of this node.
     *
     * @param string $version the version to set this node to.
     *
     * @return void
     */
    public function setVersion($version)
    {
        $this->version = strval($version);
    }

    // }}}
    // {{{ protected function createNode()

    /**
     * Creates a generator node
     *
     * @param DOMNode $context_node the parent node that will contain this
     *                              generator node.
     *
     * @return DOMNode the new generator node.
     */
    protected function createNode(DOMNode $context_node)
    {
        $document = $context_node->ownerDocument;
        return $document->createElementNS(XML_Atom_Node::NS, 'generator');
    }

    // }}}
    // {{{ protected function buildNode()

    /**
     * Builds all the XML information contained inside this generator node
     *
     * @param DOMNode $node the node that will contain the XML generated
     *                      by this generator node.
     *
     * @return void
     */
    protected function buildNode(DOMNode $node)
    {
        $document = $node->ownerDocument;

        if ($this->uri != '') {
            $node->setAttributeNS(XML_Atom_Node::NS, 'uri', $this->uri);
        }

        if ($this->version != '') {
            $node->setAttributeNS(
                XML_Atom_Node::NS,
                'version',
                $this->version
            );
        }

        $generator_content = $document->createTextNode($this->generator);
        $node->appendChild($generator_content);
    }

    // }}}
}

?>
