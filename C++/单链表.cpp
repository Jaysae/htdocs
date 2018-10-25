
#include <malloc.h>
#include <stdio.h>
#include <Windows.h>
typedef struct node /*����ڵ�Ĵ洢�ṹ*/
{
    int data;
    struct node *next;
} NODE;

NODE *create() /*�˺������ú���뷽ʽ����������*/
{
    NODE *head, *q, *p; /*����ָ�����*/
    char ch;
    int a;
    head = (NODE *)malloc(sizeof(NODE));
    /*�����µĴ洢�ռ䣬������ͷ���*/
    q = head;
    ch = '*';
    printf("\nInput the list :");
    while (ch != '?')
    /*"ch"Ϊ�Ƿ����½��ı�־����"ch"Ϊ"?"���������*/
    {
        scanf("%d", &a); /*������Ԫ��*/
        p = (NODE *)malloc(sizeof(NODE));
        p->data = a;
        q->next = p;
        q = p;
        ch = getchar(); /*�����������ı�־*/
        q->next = NULL;
        return (head); /*���ر�ͷָ��head*/
    }
}

void insert(NODE *p, int x) /*������� p ����������Ԫ�� x*/
{
    NODE *q;
    q = (NODE *)malloc(sizeof(NODE)); /*�����µĴ洢�ռ�*/
    q->data = x;
    q->next = p->next; /*ʵ��ͼ�Ģ�*/
    p->next = q;       /*ʵ��ͼ�Ģڣ����½�� q ���ӵ� p���֮��*/
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