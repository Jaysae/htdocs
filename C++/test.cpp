#include <stdio.h>
#include <Windows.h>

int main()
{
    int A[] = {23, 9, 7, 37, 16, 49, 56, 12, 78, 1}, B, T;
    for (int i = 0; i < 10; i++)
    {
        B = 0;
        for (int j = 1; j < 10 - i; j++)
            if (A[j - 1] > A[j])
            {
                T = A[j];
                A[j] = A[j - 1];
                A[j - 1] = T;
                B = 1;
            }
        if (!B)
            break;
    }
    printf("----��С�������������Ϊ:\n----");
    for (int j = 0; j < 10; j++)
        printf("%-4d", A[j]);
    printf("\n----1706060203 ���2��\n----����(��С����ð������)\n----");
    system("pause");
}
