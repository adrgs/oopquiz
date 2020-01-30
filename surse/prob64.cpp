#include <iostream>
using namespace std;

class cls {
public:
    int x, y;
    cls(int i = 0, int j = 0)
    {
        x = i;
        y = j;
    }
};

int main()
{
    cls a, b, c[3] = { cls(1, 1), cls(2, 2), a };
    cout << c[2].x;
}