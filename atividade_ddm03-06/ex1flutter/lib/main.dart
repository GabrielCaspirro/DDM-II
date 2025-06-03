import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Exercicío 1 Flutter',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
      ),
      home: const MyHomePage(title: 'Exercício 1'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key, required this.title});

  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  int _counter = 0;

  void _plusCounter() {
    setState(() {
      _counter++;
    });
  }

  void _subCounter() {
    setState(() {
      _counter--;
    });
  }

  void _multCounter() {
    setState(() {
      _counter *= 2;
    });
  }

  void _rCounter() {
    setState(() {
      _counter = 0;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.redAccent,
        title: Text(widget.title),
        centerTitle: true,
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            const Text('Explore 3 das 4 operações básicas com o flutter!'),
            Text(
              '$_counter',
              style: Theme.of(context).textTheme.headlineMedium,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                IconButton(
                  onPressed: _plusCounter,
                  icon: const Icon(Icons.add)
                ),
                IconButton(
                  onPressed: _subCounter,
                  icon: const Icon(Icons.remove)
                ),
                IconButton(
                  onPressed: _multCounter,
                  icon: const Icon(Icons.close)
                ),
                IconButton(
                  onPressed: _rCounter,
                  icon: const Icon(Icons.keyboard_return)
                ),
              ],
            )
          ],
        ),
      ),
    );
  }
}
