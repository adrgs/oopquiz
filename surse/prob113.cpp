#include <iostream>
using namespace std;
class cls
{
    int x;

public:
    cls(int i) { x = i; }
    int set_x(int i)
    {
        int y = x;
        x = i;
        return y;
    }
    int get_x() { return x; }
};
int main()
{
    cls *p = new cls[10];
    for (int i = 3; i < 9; i++)
        p[i].set_x(i);
    for (int i = 0; i < 4; i++)
        cout << p[i].get_x();
    return 0;
}