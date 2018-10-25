
#include <malloc.h>
#include <stdio.h>
#include <Windows.h>
typedef struct node /*定义节点的存储结构*/
{
    int data;
    struct node *next;
} NODE;

NODE *create() /*此函数采用后插入方式建立单链表*/
{
    NODE *head, *q, *p; /*定义指针变量*/
    char ch;
    int a;
    head = (NODE *)malloc(sizeof(NODE));
    /*申请新的存储空间，建立表头结点*/
    q = head;
    ch = '*';
    printf("\nInput the list :");
    while (ch != '?')
    /*"ch"为是否建立新结点的标志，若"ch"为"?"则输入结束*/
    {
        scanf("%d", &a); /*输入新元素*/
        p = (NODE *)malloc(sizeof(NODE));
        p->data = a;
        q->next = p;
        q = p;
        ch = getchar(); /*读入输入与否的标志*/
        q->next = NULL;
        return (head); /*返回表头指针head*/
    }
}

void insert(NODE *p, int x) /*在链表的 p 结点后插入给定元素 x*/
{
    NODE *q;
    q = (NODE *)malloc(sizeof(NODE)); /*申请新的存储空间*/
    q->data = x;
    q->next = p->next; /*实现图的①*/
    p->next = q;       /*实现图的②，将新结点 q 链接到 p结点之后*/
}

main()
{
    int x, position;
    int i = 0, j = 0;
    NODE *c, *d;
    c = create();
    d = c->next;
    while (d != NULL)
    {
        j++;
        d = d->next;
    }
    d = c;
    do
    {
        printf("Input position (again): ");
        scanf("%d", &position);
    } while ((position > j) || position < 0);
    printf("Input x: ");
    scanf("%d", &x);
    while (i != position)
    {
        d = d->next;
        i++;
    }
    insert(d, x);
    printf("Output the list: ");
    while (c->next != NULL)
    {
        c = c->next;
        printf("%5d", c->data);
    }
    printf("\n");
    system("pause");
}