#include <stdio.h>
#include <Windows.h>
#define N 4
//��ʼ��

void fun(int (*t)[N], int m)
{
    int i, j;
    for (i = 0; i < N; i++)
    {
        for (j = N - 1 - m; j >= 0; j--)
            t[i][j + m] = t[i][j];
        for (j = 0; j < m; j++)
            t[i][j] = 0;
    }
}

int main()
{
    int t[][N] = {21, 12, 13, 24, 25, 16, 47, 38, 29, 11, 32, 54, 42, 21, 33, 10}, i, j, m;
    printf("��ʼ����\n");
    for (i = 0; i < N; i++)
    {
        for (j = 0; j < N; j++)
            printf("%2d  ", t[i][j]);
        printf("\n");
    }
    printf("����������λ��m<=%d��", N);
    scanf("%d", &m);
    fun(t, m);
    printf("���ƺ�ľ���\n");
    for (i = 0; i < N; i++)
    {
        for (j = 0; j < N; j++)
            printf("%2d  ", t[i][j]);
        printf("\n");
    }
    system("pause");
}