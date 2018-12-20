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
    printf("----从小到大排序后数组为:\n----");
    for (int j = 0; j < 10; j++)
        printf("%-4d", A[j]);
    printf("\n----1706060203 软件2班\n----陈清(从小到大冒泡排序)\n----");
    system("pause");
}
