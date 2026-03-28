<?php
class Node {
    public $value;
    public $left;
    public $right;

    public function __construct($value) {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree {
    public $root;

    public function __construct() {
        $this->root = null;
    }

    // Insertar valores en el árbol (BST)
    public function insert($value) {
        $this->root = $this->insertRec($this->root, $value);
    }

    private function insertRec($node, $value) {
        if ($node == null) return new Node($value);

        // Comparación que funciona tanto para números como letras
        if ($value < $node->value) {
            $node->left = $this->insertRec($node->left, $value);
        } else {
            $node->right = $this->insertRec($node->right, $value);
        }
        return $node;
    }

    // Recorridos
    public function printPreorder($node) {
        if ($node == null) return "";
        return $node->value . " " . $this->printPreorder($node->left) . $this->printPreorder($node->right);
    }

    public function printInorder($node) {
        if ($node == null) return "";
        return $this->printInorder($node->left) . $node->value . " " . $this->printInorder($node->right);
    }

    public function printPostorder($node) {
        if ($node == null) return "";
        return $this->printPostorder($node->left) . $this->printPostorder($node->right) . $node->value . " ";
    }

    // Dibujar árbol en HTML
  public function drawSVGTree($node, $x, $y, $offset = 150) {
    if ($node == null) return "";

    $svg = "<circle cx='$x' cy='$y' r='20' fill='#1565c0' stroke='#333' />";
    $svg .= "<text x='$x' y='".($y+5)."' text-anchor='middle' fill='white'>{$node->value}</text>";

    if ($node->left) {
        $childX = $x - $offset;
        $childY = $y + 80;
        $svg .= "<line x1='$x' y1='".($y+20)."' x2='$childX' y2='".($childY-20)."' stroke='#333' />";
        $svg .= $this->drawSVGTree($node->left, $childX, $childY, $offset/1.5);
    }
    if ($node->right) {
        $childX = $x + $offset;
        $childY = $y + 80;
        $svg .= "<line x1='$x' y1='".($y+20)."' x2='$childX' y2='".($childY-20)."' stroke='#333' />";
        $svg .= $this->drawSVGTree($node->right, $childX, $childY, $offset/1.5);
    }

    return $svg;
   }
  }
?>