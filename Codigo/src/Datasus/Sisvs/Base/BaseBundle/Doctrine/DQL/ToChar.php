<?php
/**
 * Created by PhpStorm.
 * User: Glauber
 * Date: 06/05/14
 * Time: 13:06
 */

namespace Datasus\Sisvs\Base\BaseBundle\Doctrine\DQL;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

class ToChar extends FunctionNode
{
    public $field = null;

    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->field = $parser->StateFieldPathExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    public function getSql(SqlWalker $sqlWalker)
    {
        return "TO_CHAR({$this->field->dispatch($sqlWalker)})";
    }
}
