#include <stdio.h>
#include <Windows.h>
#define MAXLEN 10
typedef int elementtype;
typedef struct
{
    elementtype element[MAXLEN];
    int top;
} SqStack;
SqStack InitStack_sq()
{
    SqStack s;
    s.top = -1;
    return (s);
}
int Push_sq(SqStack *s, elementtype x)
{
    if (s->top == MAXLEN - 1)
        return (0);
    s->top++;
    s->element[s->top] = x;
    return (1);
}
int Pop_sq(SqStack *s, elementtype *x)
{
    if (s->top == -1)
        return (0);
    *x = s->element[s->top];
    s->top--;
    return (1);
}
int Empty_sq(SqStack *s) { return (s->top == -1); }
void print(SqStack s)
{
    int i;
    if (s.top != -1)
    {
        printf("----栈内元素: ");
        for (i = 0; i <= s.top; i++)
            printf("%-2d", s.element[i]);
    }
    else
        printf("----栈为空");
    printf("\n");
}
main()
{
    SqStack stack;
    int i;
    elementtype y, z;
    stack = InitStack_sq();
    printf("----请输入10个元素：");
    for (i = 1; i <= 10; i++)
    {
        scanf("%d", &y);
        Push_sq(&stack, y);
    }
    print(stack);
    printf("----出栈三个元素：");
    for (i = 1; i <= 3; i++)
    {
        Pop_sq(&stack, &z);
        printf("%-2d", z);
    }
    printf("\n");
    print(stack);
    if (Empty_sq(&stack) != 0)
        printf("----栈为空!\n");
    else
        printf("----栈不为空\n");
    printf("----1706060203 软件2班\n----陈清(顺序栈)\n----");
    system("pause");
}