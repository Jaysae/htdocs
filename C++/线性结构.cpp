#include <stdio.h>
#include <Windows.h>
#define MAXLEN 100
typedef int DataType;
typedef struct
{
    DataType data[MAXLEN];
    int Length;
} SeqList;
SeqList L;

void InitList(SeqList *L)
{
    //初始化顺序表 L 函数
    L->Length = 0;
}

void CreateList(SeqList *L, int n)
{
    //建立顺序表并输入多个元素函数
    int i;
    printf("请输入%d个整数: ", n);
    for (i = 0; i < n; i++)
        scanf("%d", &L->data[i]);
    L->Length = i; //设线性表的长度为 i
}

int GetElem(SeqList *L, int i, DataType *x)
{
    //获取顺序表中第 i 位中元素函数
    if (i < 1 || i > L->Length) //当查找位置 i 不正确时
        return 0;
    else
    {
        *x = L->data[i - 1]; //将顺序表中第 i 个元素值赋给指针 x 所指变量
        return 1;
    }
}

int Locate(SeqList *L, DataType x)
{
    //在顺序表 L 中定位元素X函数
    int i = 0;
    while (i < L->Length && L->data[i] != x)
    {
        i++;
        if (i > L->Length)
            return 0;
        else
            return i + 1; //返回元素位置
    }
}

int InsElem(SeqList *L, int i, DataType x)
{
    //在顺序表 L 中在第 i 位中插入新元素 X 函数
    int j;
    if (L->Length >= MAXLEN)
    {
        printf("顺序表已满！");
        return -1; //表满，无法插入
    }
    if (i < 1 || i > L->Length + 1) //检测给定的插入位置的正确性
    {
        printf("插入位置错误！");
        return 0;
    }
    if (i == L->Length + 1) //插入的位置为表尾，则不需要移动直接插入即可
    {
        L->data[i - 1] = x;
        L->Length++;
        return 1;
    }
    for (j = L->Length - 1; j >= i - 1; j--)
    {
        L->data[j + 1] = L->data[j];
        L->data[i - 1] = x; //新元素插入
        L->Length++;        //顺序表长度+1
        return 1;           //插入成功
    }
}

int DelElem(SeqList *L, int i, DataType *x)
{
    //在顺序表 L 中删除第 i 位中元素函数
    int j;
    if (L->Length == 0)
    {
        printf("顺序表为空！");
        return 0; //表空，无法删除
    }
    if (i < 1 || i > L->Length) //检测删除位置的合法性
    {
        printf("不存在第 i 个元素");
        return 0;
    }
    *x = L->data[i - 1];            //用指针变量 *x 返回删除的元素值
    for (j = i; j < L->Length; j++) //结点移动
        L->data[j - 1] = L->data[j];
    L->Length--; //顺序表长度减1
    return 1;    //删除成功，返回
}

void DispList(SeqList *L)
{
    //显示输出顺序表 L 的每个元素函数
    int i;
    for (i = 0; i < L->Length; i++)
    {
        printf("%5d", L->data[i]);
    }
    printf("\n");
}

void Menu(char ch3)
{
    //显示菜单函数
    printf("\n顺序表的各种操作");
    printf("\n======================");
    printf("\n1.——建立顺序表");
    int A = 1;
    if (ch3 == 'A')
    {
        printf("\n2.——插入元素");
        printf("\n3.——删除元素");
        printf("\n4.——按位置查找元素值");
        printf("\n5.——按元素值查找位置");
        printf("\n6.——顺序表的长度");
        printf("\n7.——展示线性表");
        A = 7;
    }
    printf("\n0.——退出程序");
    printf("\n======================");
    printf("\n请输入菜单号（0 - %d）：", A);
}

main()
{
    SeqList L;
    DataType x;
    int n, i, loc;
    char ch1, ch2, ch3, a;
    ch1 = 'y';
    ch3 = 'B';
    while (ch1 == 'y')
    {
        Menu(ch3);
        //scanf("%c", &ch2);
        ch2 = getchar();
        switch (ch2)
        {
        case '1':
            InitList(&L);
            printf("请输入建立线性表的大小：");
            scanf("%d", &n);
            CreateList(&L, n);
            system("cls");
            printf("建立的线性表为：");
            DispList(&L);
            ch3 = 'A';
            break;
        case '2':
            printf("请输入要插入的位置：");
            scanf("%d", &i);
            printf("请输入要插入的元素值：\n");
            scanf("%d", &x);
            if (InsElem(&L, i, x))
            {
                system("cls");
                printf("已成功在第%d的位置上插入%d，插入后的线性表为：\n", i, x);
                DispList(&L);
            }
            else
                printf("输入插入的参数错误！");
            break;
        case '3':
            printf("请输入要删除的元素位置：");
            scanf("%d", &i);
            if (DelElem(&L, i, &x))
            {
                system("cls");
                printf("已成功在第%d的位置上删除%d，删除后的线性表为：\n", i, x);
                DispList(&L);
            }
            else
                printf("输入删除的参数错误！");
            break;
        case '4':
            printf("请输入要查看表中元素的位置（从 1 开始）：");
            scanf("%d", &i);
            if (GetElem(&L, i, &x))
                printf("当前线性表第%d个元素的值为：%d", i, x);
            else
                printf("输入的位置错误！");
            break;
        case '5':
            printf("请输入要查找的元素值为：");
            scanf("%d", &x);
            loc = Locate(&L, x);
            if (loc)
                printf("查找元素值为%d的位置为：%d", x, loc);
            else
                printf("表中无此元素");
            break;
        case '6':
            printf("当前线性表的长度为：%d", L.Length);
            break;
        case '7':
            system("cls");
            printf("当前线性表为：\n");
            DispList(&L);
            break;
        case '0':
            ch1 = 'n';
            break;
        default:
            break;
        }
        if (ch2 != '0')
        {
            a = getchar();
            if (a != '\xA')
            {
                getchar();
                ch1 = 'n';
            }
        }
    }
}