#include <stdio.h>
#include <windows.h>

int main(int argc, char const *argv[])
{
    printf("������һ������\n");
    int a, b;
    scanf("%d", &a);
    a *= 100;
    printf("��һ�㣬��100��%d\n", a);
    //a <<= 7;
    //printf("�ڶ��㣬����7��%d\n", a);
    a *= 7;
    printf("�����㣬����7��%d\n", a);
    a -= 15;
    printf("���Ĳ㣬��ȥ15��%d\n", a);
    b = a % 2;
    a /= 2;
    printf("����㣬��2��%d\n", a);
    a >>= 1;
    printf("�����㣬����1��%d\n", a);
    printf("�õ��㷨���ܺ����֣�%x%d\n���ܿ�ʼ��\n", a, b);
    printf("��һ�㣬����ת����%d\n", a);
    a <<= 1;
    printf("�ڶ��㣬����1��%d\n", a);
    a *= 2;
    a += b;
    printf("�����㣬��2��%d\n", a);
    a += 15;
    printf("���Ĳ㣬��15��%d\n", a);
    a /= 7;
    printf("����㣬��7��%d\n", a);
    //a >>= 7;
    //printf("�����㣬����7��%d\n", a);
    a /= 100;
    printf("���߲㣬����100��%d\n", a);
    system("pause");
    return 0;
}