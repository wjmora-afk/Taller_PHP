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
    public function buildTree($preorder, $inorder) {
        if (empty($preorder) || empty($inorder)) return null;

        $rootValue = array_shift($preorder);
        $root = new Node($rootValue);

        $rootIndex = array_search($rootValue, $inorder);
        $leftInorder = array_slice($inorder, 0, $rootIndex);
        $rightInorder = array_slice($inorder, $rootIndex + 1);

        $root->left = $this->buildTree(array_slice($preorder, 0, count($leftInorder)), $leftInorder);
        $root->right = $this->buildTree(array_slice($preorder, count($leftInorder)), $rightInorder);

        return $root;
    }

    public function printInorder($node) {
        if ($node == null) return "";
        return $this->printInorder($node->left) . $node->value . " " . $this->printInorder($node->right);
    }
}
?>