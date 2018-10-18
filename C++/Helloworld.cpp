#include <stdio.h>
#include <windows.h>

int main(int argc, char const *argv[])
{
    printf("请输入一串数字\n");
    int a, b;
    scanf("%d", &a);
    a *= 100;
    printf("第一层，乘100：%d\n", a);
    //a <<= 7;
    //printf("第二层，左移7：%d\n", a);
    a *= 7;
    printf("第三层，乘于7：%d\n", a);
    a -= 15;
    printf("第四层，减去15：%d\n", a);
    b = a % 2;
    a /= 2;
    printf("第五层，除2：%d\n", a);
    a >>= 1;
    printf("第六层，右移1：%d\n", a);
    printf("得到算法加密后数字：%x%d\n解密开始：\n", a, b);
    printf("第一层，进制转换：%d\n", a);
    a <<= 1;
    printf("第二层，左移1：%d\n", a);
    a *= 2;
    a += b;
    printf("第三层，乘2：%d\n", a);
    a += 15;
    printf("第四层，加15：%d\n", a);
    a /= 7;
    printf("第五层，除7：%d\n", a);
    //a >>= 7;
    //printf("第六层，右移7：%d\n", a);
    a /= 100;
    printf("第七层，除于100：%d\n", a);
    system("pause");
    return 0;
}