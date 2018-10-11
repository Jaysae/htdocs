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
    //��ʼ��˳��� L ����
    L->Length = 0;
}

void CreateList(SeqList *L, int n)
{
    //����˳���������Ԫ�غ���
    int i;
    printf("������%d������: ", n);
    for (i = 0; i < n; i++)
        scanf("%d", &L->data[i]);
    L->Length = i; //�����Ա�ĳ���Ϊ i
}

int GetElem(SeqList *L, int i, DataType *x)
{
    //��ȡ˳����е� i λ��Ԫ�غ���
    if (i < 1 || i > L->Length) //������λ�� i ����ȷʱ
        return 0;
    else
    {
        *x = L->data[i - 1]; //��˳����е� i ��Ԫ��ֵ����ָ�� x ��ָ����
        return 1;
    }
}

int Locate(SeqList *L, DataType x)
{
    //��˳��� L �ж�λԪ��X����
    int i = 0;
    while (i < L->Length && L->data[i] != x)
    {
        i++;
        if (i > L->Length)
            return 0;
        else
            return i + 1; //����Ԫ��λ��
    }
}

int InsElem(SeqList *L, int i, DataType x)
{
    //��˳��� L ���ڵ� i λ�в�����Ԫ�� X ����
    int j;
    if (L->Length >= MAXLEN)
    {
        printf("˳���������");
        return -1; //�������޷�����
    }
    if (i < 1 || i > L->Length + 1) //�������Ĳ���λ�õ���ȷ��
    {
        printf("����λ�ô���");
        return 0;
    }
    if (i == L->Length + 1) //�����λ��Ϊ��β������Ҫ�ƶ�ֱ�Ӳ��뼴��
    {
        L->data[i - 1] = x;
        L->Length++;
        return 1;
    }
    for (j = L->Length - 1; j >= i - 1; j--)
    {
        L->data[j + 1] = L->data[j];
        L->data[i - 1] = x; //��Ԫ�ز���
        L->Length++;        //˳�����+1
        return 1;           //����ɹ�
    }
}

int DelElem(SeqList *L, int i, DataType *x)
{
    //��˳��� L ��ɾ���� i λ��Ԫ�غ���
    int j;
    if (L->Length == 0)
    {
        printf("˳���Ϊ�գ�");
        return 0; //��գ��޷�ɾ��
    }
    if (i < 1 || i > L->Length) //���ɾ��λ�õĺϷ���
    {
        printf("�����ڵ� i ��Ԫ��");
        return 0;
    }
    *x = L->data[i - 1];            //��ָ����� *x ����ɾ����Ԫ��ֵ
    for (j = i; j < L->Length; j++) //����ƶ�
        L->data[j - 1] = L->data[j];
    L->Length--; //˳����ȼ�1
    return 1;    //ɾ���ɹ�������
}

void DispList(SeqList *L)
{
    //��ʾ���˳��� L ��ÿ��Ԫ�غ���
    int i;
    for (i = 0; i < L->Length; i++)
    {
        printf("%5d", L->data[i]);
    }
    printf("\n");
}

void Menu(char ch3)
{
    //��ʾ�˵�����
    printf("\n˳���ĸ��ֲ���");
    printf("\n======================");
    printf("\n1.��������˳���");
    int A = 1;
    if (ch3 == 'A')
    {
        printf("\n2.��������Ԫ��");
        printf("\n3.����ɾ��Ԫ��");
        printf("\n4.������λ�ò���Ԫ��ֵ");
        printf("\n5.������Ԫ��ֵ����λ��");
        printf("\n6.����˳���ĳ���");
        printf("\n7.����չʾ���Ա�");
        A = 7;
    }
    printf("\n0.�����˳�����");
    printf("\n======================");
    printf("\n������˵��ţ�0 - %d����", A);
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
            printf("�����뽨�����Ա�Ĵ�С��");
            scanf("%d", &n);
            CreateList(&L, n);
            system("cls");
            printf("���������Ա�Ϊ��");
            DispList(&L);
            ch3 = 'A';
            break;
        case '2':
            printf("������Ҫ�����λ�ã�");
            scanf("%d", &i);
            printf("������Ҫ�����Ԫ��ֵ��\n");
            scanf("%d", &x);
            if (InsElem(&L, i, x))
            {
                system("cls");
                printf("�ѳɹ��ڵ�%d��λ���ϲ���%d�����������Ա�Ϊ��\n", i, x);
                DispList(&L);
            }
            else
                printf("�������Ĳ�������");
            break;
        case '3':
            printf("������Ҫɾ����Ԫ��λ�ã�");
            scanf("%d", &i);
            if (DelElem(&L, i, &x))
            {
                system("cls");
                printf("�ѳɹ��ڵ�%d��λ����ɾ��%d��ɾ��������Ա�Ϊ��\n", i, x);
                DispList(&L);
            }
            else
                printf("����ɾ���Ĳ�������");
            break;
        case '4':
            printf("������Ҫ�鿴����Ԫ�ص�λ�ã��� 1 ��ʼ����");
            scanf("%d", &i);
            if (GetElem(&L, i, &x))
                printf("��ǰ���Ա��%d��Ԫ�ص�ֵΪ��%d", i, x);
            else
                printf("�����λ�ô���");
            break;
        case '5':
            printf("������Ҫ���ҵ�Ԫ��ֵΪ��");
            scanf("%d", &x);
            loc = Locate(&L, x);
            if (loc)
                printf("����Ԫ��ֵΪ%d��λ��Ϊ��%d", x, loc);
            else
                printf("�����޴�Ԫ��");
            break;
        case '6':
            printf("��ǰ���Ա�ĳ���Ϊ��%d", L.Length);
            break;
        case '7':
            system("cls");
            printf("��ǰ���Ա�Ϊ��\n");
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