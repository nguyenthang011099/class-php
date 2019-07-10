<?php

declare(strict_types=1);

namespace Tests\BinarySearchTree;

use Exercises\BinarySearchTree\BinarySearchTree;
use PHPUnit\Framework\TestCase;
use function method_exists;

final class BinarySearchTreeTest extends TestCase
{
    public function testHasProperties(): void
    {
        self::markTestSkipped();
        self::assertClassHasAttribute('data', BinarySearchTree::class);
        self::assertClassHasAttribute('left', BinarySearchTree::class);
        self::assertClassHasAttribute('right', BinarySearchTree::class);
    }

    public function testHasMethods(): void
    {
        self::markTestSkipped();
        self::assertTrue(
            method_exists(BinarySearchTree::class, 'insert'),
            'Class does not have method insert'
        );
        self::assertTrue(
            method_exists(BinarySearchTree::class, 'contains'),
            'Class does not have method contains'
        );
    }

    public function testCanInsert(): void
    {
        self::markTestSkipped();
        $node = new BinarySearchTree(10);

        $node->insert(5);
        $node->insert(15);
        $node->insert(20);

        self::assertSame(5, $node->left->data);
        self::assertSame(15, $node->right->data);
        self::assertSame(20, $node->right->right->data);
    }

    public function testContains(): void
    {
        self::markTestSkipped();
        $node = new BinarySearchTree(10);

        $node->insert(5);
        $node->insert(15);
        $node->insert(20);
        $node->insert(0);
        $node->insert(-5);
        $node->insert(3);

        $three = $node->left->left->right;

        self::assertSame($three, $node->contains(3));
    }

    /**
     *         10
     *        /  \
     *       5    15
     *      /      \
     *     0        20
     *   /   \
     * -5     3.
     */
    public function testDepthFirstInOrder(): void
    {
        self::markTestSkipped();
        $node = new BinarySearchTree(10);

        $node->insert(5);
        $node->insert(15);
        $node->insert(20);
        $node->insert(0);
        $node->insert(-5);
        $node->insert(3);

        self::assertSame([-5, 0, 3, 5, 10, 15, 20], $node->depthFirstInOrder());
    }

    /**
     *         10
     *        /  \
     *       5    15
     *      /      \
     *     0        20
     *   /   \
     * -5     3.
     */
    public function testDepthFirstPostOrder(): void
    {
        self::markTestSkipped();
        $node = new BinarySearchTree(10);

        $node->insert(5);
        $node->insert(15);
        $node->insert(20);
        $node->insert(0);
        $node->insert(-5);
        $node->insert(3);

        self::assertSame([-5, 3, 0, 5, 20, 15, 10], $node->depthFirstPostOrder());
    }

    /**
     *         10
     *        /  \
     *       5    15
     *      /      \
     *     0        20
     *   /   \
     * -5     3.
     */
    public function testDepthFirstPreOrder(): void
    {
        self::markTestSkipped();
        $node = new BinarySearchTree(10);

        $node->insert(5);
        $node->insert(15);
        $node->insert(20);
        $node->insert(0);
        $node->insert(-5);
        $node->insert(3);

        self::assertSame([10, 5, 0, -5, 3, 15, 20], $node->depthFirstPreOrder());
    }
}
