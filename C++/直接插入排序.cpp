#include <stdio.h>
#include <windows.h>
int main()
{
    int r[5] = {0, 5, 12, 26, 32};
    int i, j;
    for (i = 2; i < 5; i++)
        if (r[i] < r[i - 1])
        {
            r[0] = r[i];
            for (j = i - 1; r[0] < r[j]; --j)
                r[j + 1] = r[i];
            r[j + 1] = r[0];
        }
    for (i = 1; i < 5; i++)
        printf("%5d", r[i]);
    printf("\n");
    system("pause");
}